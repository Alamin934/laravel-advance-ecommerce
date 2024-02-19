<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order,OrderDetails};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
            'order_id' => Str::upper(Str::random(8)),
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
        Cart::destroy();
        if(session()->has('coupon')){
            session()->forget('coupon');
        }
        return redirect()->route('home')->with(['message'=>'Order Placed successfully', 'alert-type'=>'success']);
    }
}
