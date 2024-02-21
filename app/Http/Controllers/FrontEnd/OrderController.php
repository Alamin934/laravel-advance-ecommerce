<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order,OrderDetails};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Mail\{OrderPlaced,OrderPlacedNotifyAdmin};
use Illuminate\Support\Facades\Mail;
use Cart;

class OrderController extends Controller
{
    
    public function placeOrder(Request $request){

        $this->authorize('create', Order::class);
        // Shipping Address validation check
        $validated = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required',
            'country' => 'required',
            'payment' => 'required',
        ]);

        // Coupon check
        if(session()->has('coupon')){
            $coupon_name = session()->get('coupon')['coupon_name'];
            $discount = session()->get('coupon')['discount'];
            $after_discount = session()->get('coupon')['after_discount'];
        }
        // Cash On Delivery Order placed
        if($request->payment == 'cash-on-delivery'){
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'customer_email' => $request->email,
                'customer_name' => $request->name,
                'customer_phone' => $request->phone,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'country' => $request->country,
                'sub_total' => Cart::subtotal(),
                'total' => Cart::total(),
                'coupon_code' => $coupon_name ?? null,
                'coupon_discount' => $discount ?? null,
                'coupon_after_discount' => $after_discount ?? null,
                'payment_type' => $request->payment,
                'payment_status' => 'pending',
                'tax' => 0,
                'shipping_charge' => 0,
                'order_status' => 'pending',
                'order_id' => rand(10000000, 99999999),
            ]);

            
            $cart = Cart::content();
            foreach($cart as $item){
                $order->order_details()->create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $item->id,
                    'product_name' => $item->name,
                    'color' => $item->options->color,
                    'size' => $item->options->size,
                    'quantity' => $item->qty,
                    'price' => $item->price,
                    'total_price' => $item->price*$item->qty,
                ]);
            }
            // Mail::to($request->user())->send(new OrderPlaced($order));
            // Mail::to('admin@admin.com')->send(new OrderPlacedNotifyAdmin($order));
            
            Cart::destroy();
            if(session()->has('coupon')){
                session()->forget('coupon');
            }
            return redirect()->route('home')->with(['message'=>'Order Placed successfully', 'alert-type'=>'success']);

        }else{
            $aamarPayInfo = DB::table('bd_payment_getway_info')->where('getway_name', 'aamarPay')->first();

            if($aamarPayInfo){
                $tran_id = "test".rand(1111111,9999999);//unique transection id for every transection 
                $currency= "BDT"; //aamarPay support Two type of currency USD & BDT  
                $amount = $after_discount ?? Cart::total(2,'.','');   //10 taka is the minimum amount for show card option in aamarPay payment gateway
                //For live Store Id & Signature Key please mail to support@aamarpay.com
                $store_id = $aamarPayInfo->store_id; 
                $signature_key = $aamarPayInfo->secret_key; 
                $url = "https://​sandbox​.aamarpay.com/jsonpost.php"; // for Live Transection use "https://secure.aamarpay.com/jsonpost.php"
                $curl = curl_init();

                curl_setopt_array($curl, array(
                CURLOPT_URL => $url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                    "store_id": "'.$store_id.'",
                    "tran_id": "'.$tran_id.'",
                    "success_url": "'.route('success').'",
                    "fail_url": "'.route('fail').'",
                    "cancel_url": "'.route('cancel').'",
                    "amount": "'.$amount.'",
                    "currency": "'.$currency.'",
                    "signature_key": "'.$signature_key.'",
                    "desc": "Merchant Registration Payment",
                    "cus_name": "'.$request->name.'",
                    "cus_email": "'.$request->email.'",
                    "cus_add1": "'.$request->address.'",
                    "cus_add2": "'.$request->address.'",
                    "cus_city": "'.$request->city.'",
                    "cus_state": "'.$request->state.'",
                    "cus_postcode": "'.$request->postal_code.'",
                    "cus_country": "'.$request->country.'",
                    "cus_phone": "'.$request->phone.'",
                    "opt_a": "'.$request->state.'",
                    "opt_b": "'.$request->postal_code.'",
                    "cus_phone": "'.$request->phone.'",
                    "type": "json"
                }',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/json'
                ),
                ));

                $response = curl_exec($curl);

                curl_close($curl);
                // dd($response);
                
                $responseObj = json_decode($response);

                if(isset($responseObj->payment_url) && !empty($responseObj->payment_url)) {

                    $paymentUrl = $responseObj->payment_url;
                    // dd($paymentUrl);
                    return redirect()->away($paymentUrl);

                }else{
                    echo $response;
                }
            }else{
                return redirect()->back()->with(['message'=>'This Payment method is not available now. please try with another.', 'alert-type'=>'error']);
            }

        }
    }

     public function success(Request $request){
        // return $request;
        $request_id= $request->mer_txnid;

        //verify the transection using Search Transection API 
        $url = "http://sandbox.aamarpay.com/api/v1/trxcheck/request.php?request_id=$request_id&store_id=aamarpaytest&signature_key=dbb74894e82415a2f7ff0ec3a97e4183&type=json";
        
        //For Live Transection Use "http://secure.aamarpay.com/api/v1/trxcheck/request.php"
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $responseObj = json_decode($response);
        echo "<pre>";
        print_r($responseObj);
        echo "</pre>";

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'customer_email' => $responseObj->cus_email,
            'customer_name' => $responseObj->cus_name,
            'customer_phone' => $responseObj->cus_phone,
            'address' => $responseObj->cus_add1,
            'city' => $responseObj->cus_city,
            'state' => $responseObj->opt_a,
            'postal_code' => $responseObj->opt_b,
            'country' => $responseObj->cus_country,
            'sub_total' => Cart::subtotal(2,'.',''),
            'total' => Cart::total(2,'.',''),
            'coupon_code' => $coupon_name ?? null,
            'coupon_discount' => $discount ?? null,
            'coupon_after_discount' => $after_discount ?? null,
            'payment_type' => 'aamarPay',
            'payment_status' => 'received',
            'tax' => 0,
            'shipping_charge' => 0,
            'order_status' => 'received',
            'order_id' => rand(10000000, 99999999),
        ]);

        
        $cart = Cart::content();
        foreach($cart as $item){
            $order->order_details()->create([
                'user_id' => auth()->user()->id,
                'product_id' => $item->id,
                'product_name' => $item->name,
                'color' => $item->options->color,
                'size' => $item->options->size,
                'quantity' => $item->qty,
                'price' => $item->price,
                'total_price' => $item->price*$item->qty,
            ]);
        }

        $order->payment_details()->create([
            'user_id' => auth()->user()->id,
            'pay_status' => $responseObj->pay_status,
            'amount' => $responseObj->amount,
            'payment_processor' => $responseObj->payment_processor,
            'payment_type' => $responseObj->payment_type,
            'date_processed' => $responseObj->date_processed,
            'rec_amount' => $responseObj->rec_amount,
            'processing_charge' => $responseObj->processing_charge,
        ]);
        // Mail::to($request->user())->send(new OrderPlaced($order));
        // Mail::to('admin@admin.com')->send(new OrderPlacedNotifyAdmin($order));
        
        Cart::destroy();
        if(session()->has('coupon')){
            session()->forget('coupon');
        }
        return redirect()->route('home')->with(['message'=>'Order Placed successfully', 'alert-type'=>'success']);
        
    }

    public function fail(Request $request){
        return redirect()->route('checkout')->with(['message'=>'Payment Failed. Order not placed. please try again.', 'alert-type'=>'error']);;
    }

    public function cancel(){
        return 'Canceled';
    }


    public function showOrders(){
        if(auth()->user()->is_admin === 1){
            return redirect()->route('admin.dashboard');
        }else{
            $user_id = auth()->user()->id;
            $orders = Order::where('user_id', $user_id)->orderByDesc('id')->take(5)->get();
            $total = Order::where('user_id', $user_id)->count();
            $complete = Order::where('user_id', $user_id)->where('order_status', 'completed')->count();
            $return = Order::where('user_id', $user_id)->where('order_status', 'returned')->count();
            $cancel = Order::where('user_id', $user_id)->where('order_status', 'canceled')->count();
            return view('frontend.dashboard.dashboard', compact('orders','total','complete','return','cancel'));
        }
    }
    
    public function myOrders(){
        $user_id = auth()->user()->id;
        $orders = Order::where('user_id', $user_id)->orderByDesc('id')->get();
        return view('frontend.dashboard.orders', compact('orders'));
    }
    
    public function orderDetails(string $id){
        $user_id = auth()->user()->id;
        $order = Order::where('user_id', $user_id)->where('id', $id)->first();
        $order_details = OrderDetails::where('user_id', $user_id)->where('order_id', $id)->get();
        return view('frontend.dashboard.order-details', compact('order_details', 'order'));
    }


}
