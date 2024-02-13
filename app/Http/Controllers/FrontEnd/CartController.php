<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;


class CartController extends Controller
{
    public function addToCart(Request $request){
        $product = Product::find($request->id);
        Cart::add([
            'id' => $request->id,
            'name' => $product->title,
            'qty' => $request->qty ?? 1,
            'price' => $product->selling_price ?? $product->purchase_price,
            'weight' => 1,
            'options' => ['size' => '', 'color' => '']
        ]);

        return response()->json(['status'=>'success']);
    }
}
