<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\{Product,Category};
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::with('sub_categories.ChildCategory')->get();
        $banner = Product::with('brand')->where('home_banner', 'on')->latest()->first();
        // return $banner_product;
        return view('home', compact('categories', 'banner'));
    }
}
