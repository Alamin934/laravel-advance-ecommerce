<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cart;

class CheckoutController extends Controller
{
    public function index(){
        if(auth()->user() && Cart::content()->count() > 0){
            $shipping = DB::table('shippings')->where('user_id', auth()->user()->id)->latest()->first();
            $cart = Cart::content();
            return view('frontend.checkout', compact('cart','shipping'));
        }
        elseif(auth()->user() && Cart::content()->count() == 0){
            return redirect()->back()->with(['message'=>'Cart is Empty. Add some product', 'alert-type'=>'error']);
        }
        else{
            return redirect()->back()->with(['message'=>'Please Login for checkout', 'alert-type'=>'error']);
        }
    }

    public function applyCoupon(Request $request){
        $coupon = DB::table('coupons')->where('coupon_code', $request->coupon_code)->first();
        if(empty($coupon)){
            return response()->json(['status'=>'error', 'msg'=>'Coupon is Invalid.']);
        }
        elseif(date("Y-m-d") > date("Y-m-d", strtotime($coupon->valid_date))){
            return response()->json(['status'=>'error', 'msg'=>'Coupon Expired.']);
        }else{
            if($coupon->amount > Cart::total()){
                return response()->json(['status'=>'error', 'msg'=>'Sorry, You can not use this Coupon.']);
            }else{
                $subTotal = Cart::subTotal(2,'.','');
                session(['coupon' => [
                    'coupon_name' => $coupon->coupon_code,
                    'discount' => $coupon->amount,
                    'after_discount' => number_format($subTotal - $coupon->amount,2),
                ]]);
                return response()->json(['status'=>'success', 'msg'=>'Coupon Applied.']);
            }
        }
    }
    public function removeCoupon(Request $request){
        session()->forget('coupon');
        return response()->json(['status'=>'success', 'msg'=>'Coupon Removed.']);

    }
}
