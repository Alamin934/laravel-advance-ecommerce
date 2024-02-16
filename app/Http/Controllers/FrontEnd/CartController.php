<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;


class CartController extends Controller
{

    public function displayCart() {
        if(auth()->user()){
            $cart = Cart::content();
            return view('frontend.cart', compact('cart'));
        }else{
            return redirect()->back()->with(['message'=>'Please Login for Cart Items', 'alert-type'=>'error']);
        }
    }

    public function addToCart(Request $request){
        $product = Product::find($request->id);
        Cart::add([
            'id' => $request->id,
            'name' => $product->title,
            'qty' => $request->qty ?? 1,
            'price' => $product->selling_price ?? $product->purchase_price,
            'weight' => 1,
            'options' => [
                'size' => $request->size ?? null,
                'color' => $request->color ?? null,
            ]
        ]);
        $total_item = Cart::count();
        $total_price = Cart::total();
        return response()->json(['status'=>'success', 'total_item'=>$total_item, 'total_price'=>$total_price]);
    }

    public function updateQty(Request $request, string $rowId){
        if($request->qty){
            Cart::update($rowId, $request->qty);
            $total_item = Cart::count();
            $total_price = Cart::total();
            return response()->json(['status'=>'success','msg'=>'Quantity Updated','total_item'=>$total_item, 'total_price'=>$total_price]);
        }
    }
    public function updateSize(Request $request, string $rowId){
        if($request->size){
            Cart::update($rowId, ['options'=>['size'=>$request->size,'color'=>$request->color]]);
            return response()->json(['status'=>'success','msg'=>'Size Updated']);
        }
    }
    public function updateColor(Request $request, string $rowId){
        if($request->color){
            Cart::update($rowId, ['options'=>['size'=>$request->size,'color'=>$request->color]]);
            return response()->json(['status'=>'success','msg'=>'Color Updated',]);
        }
    }

    public function removeFromCart(string $rowId){
        Cart::remove($rowId);
        $total_item = Cart::count();
        $total_price = Cart::total();
        return response()->json(['status'=>'success','msg'=>'Product remove from cart successfully','total_item'=>$total_item, 'total_price'=>$total_price]);
    }
}
