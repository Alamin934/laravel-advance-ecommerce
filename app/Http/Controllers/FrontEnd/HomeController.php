<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\{Product,Category};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::get();
        $banner = Product::where('home_banner', 'on')->latest()->first();
        return view('home', compact('categories', 'banner'));
    }

    public function singleProduct(string $slug){
        $categories = Category::get();
        $product = Product::where('slug', $slug)->first();
        $related_products = Product::where('sub_category_id', $product->sub_category_id)->get();
        return view('frontend.single-product' ,compact('product','categories','related_products'));
    }
}
