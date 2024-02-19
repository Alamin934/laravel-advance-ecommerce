<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;

class CheckoutController extends Controller
{
    public function index(){
        if(auth()->user()){
            $cart = Cart::content();
            return view('frontend.checkout', compact('cart'));
        }else{
            return redirect()->back()->with(['message'=>'Please Login for checkout', 'alert-type'=>'error']);
        }
    }
}
