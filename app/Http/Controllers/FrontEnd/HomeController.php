<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\{Product,Category,Wishlist};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $banner = Product::where('home_banner', 'on')->latest()->first();
        $featureds = Product::where('featured', 'on')->where('status', 'on')->orderByDesc('id')->take(16)->get();
        $most_populars = Product::where('status', 'on')->where('product_views','>', '2')->orderByDesc('product_views')->take(16)->get();
        $categories = Category::inRandomOrder()->get();
        $new_arrivals = Category::where('is_home', 1)->get();
        $recent_views = Product::where('status', 'on')->where('product_views', '>','0')->orderByDesc('updated_at')->take(16)->get();

        return view('home', compact('banner', 'featureds', 'most_populars','categories','new_arrivals','recent_views'));
    }

    public function singleProduct(string $slug){
        $product = Product::where('slug', $slug)->first();
        Product::where('slug', $slug)->increment('product_views');
        $related_products = Product::where('sub_category_id', $product->sub_category_id)->get();
        return view('frontend.single-product' ,compact('product','related_products'));
    }

    public function addToWishlist($id) {
        $wishlist_product = Wishlist::where('product_id', $id)->where('user_id', Auth::id())->first();
        if($wishlist_product){
            return response()->json(['status'=>'error', 'message'=>'This product already has been to Wishlist.']);
        }else{
            $add_to_wishlist = Wishlist::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
            ]);
            $wishlist_count = Wishlist::where('user_id', Auth::id())->count();
            return response()->json(['status'=>'success', 'message'=>'Product Added to Wishlist.', 'wishlist_count'=>$wishlist_count]);
        }
    }
    public function showWishlist() {
        $wishlist_product = Wishlist::where('user_id', Auth::id())->get();
        // return $wishlist_product;
        return view('frontend.wishlist', compact('wishlist_product'));
    }
    public function removeToWishlist($id) {
        $wishlist_product = Wishlist::find($id);
        $wishlist_product->delete();
        $wishlist_count = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['status'=>'success','wishlist_count'=>$wishlist_count]);
    }
}
