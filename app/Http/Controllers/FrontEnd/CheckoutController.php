<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;

class CheckoutController extends Controller
{
    // Display Checkout page
    public function index(){
        if(auth()->user() && Cart::content()->count() > 0){
            $shipping = DB::table('shippings')->where('user_id', auth()->user()->id)->latest()->first();
            $cart = Cart::content();
            return view('frontend.checkout', compact('cart','shipping'));
        }
        elseif(auth()->user() && Cart::content()->count() == 0){
            return redirect()->route('display.cart')->with(['message'=>'Cart is Empty. Add some product', 'alert-type'=>'error']);
        }
        else{
            return redirect()->back()->with(['message'=>'Please Login for checkout', 'alert-type'=>'error']);
        }
    }

    // Apply Coupon
    public function applyCoupon(Request $request){
        $coupon = DB::table('coupons')->where('coupon_code', $request->coupon_code)->where('status', 1)->first();
        if(empty($coupon)){
            return response()->json(['status'=>'error', 'msg'=>'Coupon is Invalid.']);
        }
        elseif(date("Y-m-d") > date("Y-m-d", strtotime($coupon->valid_date))){
            return response()->json(['status'=>'error', 'msg'=>'Coupon Expired.']);
        }else{
            if($coupon->amount > Cart::total(2,'.','')){
                return response()->json(['status'=>'error', 'msg'=>'Sorry, You can not use this Coupon.']);
            }else{
                $subTotal = Cart::subTotal(2,'.','');
                session(['coupon' => [
                    'coupon_name' => $coupon->coupon_code,
                    'discount' => $coupon->amount,
                    'after_discount' => number_format($subTotal - $coupon->amount,2),
                ]]);
                return response()->json(['status'=>'success', 'msg'=>'Coupon Applied.','total_price'=>number_format($subTotal - $coupon->amount,2)]);
            }
        }
    }
    // Remove Coupon
    public function removeCoupon(Request $request){
        $total_price = Cart::total(2,'.','');
        session()->forget('coupon');
        return response()->json(['status'=>'success', 'msg'=>'Coupon Removed.','total_price'=>$total_price]);

    }
}
