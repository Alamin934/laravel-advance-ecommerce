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
        // Cart::destroy();
        Cart::add([
            'id' => $request->id,
            'name' => $product->title,
            'qty' => $request->qty ?? 1,
            'price' => $product->selling_price ?? $product->purchase_price,
            'weight' => 1,
            'options' => [
                'size' => $request->size ?? null,
                'all_color' => $product->color ?? null,
                'color' => $request->color ?? null,
                'thumbnail' => $product->thumbnail,
                'category' => $product->category->name,
                'brand' => !empty($product->brand_id) ? $product->brand->brand_name : 'No Brand',
                'slug' => $product->slug,
            ]
        ]);
        $total_item = Cart::count();
        $total_price = Cart::total();

        return response()->json(['status'=>'success', 'total_item'=>$total_item, 'total_price'=>$total_price]);
    }
    public function removeFromCart(string $rowId){
        Cart::remove($rowId);
        $total_item = Cart::count();
        $total_price = Cart::total();
        return response()->json(['status'=>'success','total_item'=>$total_item, 'total_price'=>$total_price]);
    }
}
