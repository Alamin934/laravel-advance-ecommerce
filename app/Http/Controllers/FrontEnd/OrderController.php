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

        $validated = $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'postal_code' => 'required|numeric',
            'country' => 'required',
            'payment' => 'required',
        ]);

        if(session()->has('coupon')){
            $coupon_name = session()->get('coupon')['coupon_name'];
            $discount = session()->get('coupon')['discount'];
            $after_discount = session()->get('coupon')['after_discount'];
        }
        
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
