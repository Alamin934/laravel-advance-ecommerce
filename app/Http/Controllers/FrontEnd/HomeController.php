<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\{Product,Category,SubCategory,ChildCategory,Wishlist,Brand};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\NewsletterUserMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        $banner = Product::where('home_banner', 'on')->latest()->first();
        $featureds = Product::where('featured', 'on')->where('status', 'on')->orderByDesc('id')->take(16)->get();
        $most_populars = Product::where('status', 'on')->where('product_views','>', '2')->orderByDesc('product_views')->take(16)->get();
        // $categories = Category::inRandomOrder()->get();
        $new_arrivals = Category::where('is_home', 1)->get();
        $recent_views = Product::where('status', 'on')->where('product_views', '>','0')->orderByDesc('updated_at')->take(16)->get();
        $brands = Brand::get();

        return view('home', compact('banner', 'featureds', 'most_populars','new_arrivals','recent_views','brands'));
    }

    public function singleProduct(string $slug){
        $product = Product::where('slug', $slug)->first();
        Product::where('slug', $slug)->increment('product_views');
        $related_products = Product::where('sub_category_id', $product->sub_category_id)->get();
        $brands = Brand::get();
        return view('frontend.single-product' ,compact('product','related_products','brands'));
    }

    public function addToWishlist($id) {
        $wishlist_product = Wishlist::where('product_id', $id)->where('user_id', Auth::id())->first();
        if(auth()->user() != null){
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
        }else{
            return response()->json(['status'=>'error', 'message'=>'Please Login for Add to Wishlist']);
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

    // Link Wise Product Display
    public function linkWiseProduct(Request $request,string $id){
        $brands = Brand::get();
        $recent_views = Product::where('status', 'on')->where('product_views', '>','0')->orderByDesc('updated_at')->take(16)->get();
        
        $products;
        $link;
        if($request->query('link') == 'category'){
            $products = Product::where('category_id', $id)->orderByDesc('id')->paginate(20);
            $link = Category::find($id);
        }
        if($request->query('link') == 'sub_category'){
            $products = Product::where('sub_category_id', $id)->orderByDesc('id')->paginate(20);
            $link = SubCategory::find($id);
        }
        if($request->query('link') == 'child_category'){
            $products = Product::where('child_category_id', $id)->orderByDesc('id')->paginate(20);
            $link = ChildCategory::find($id);
        }
        if($request->query('link') == 'brand'){
            $products = Product::where('brand_id', $id)->orderByDesc('id')->paginate(20);
            $link = Brand::find($id);
        }
        return view('frontend.link-wise-product', compact('products','link','brands','recent_views'));
    }

    // Store NewsLetter
    public function newsLetter(Request $request){
        $validated = $request->validate([
            'email'=>'required|email',
        ]);
        $newsletter = DB::table('newsletters')->where('email', $request->email)->first();
        if($newsletter){
            return response()->json(['status'=>'error', 'msg'=>'You already Subscribed us.']);
        }else{
            DB::table('newsletters')->insert([
                'email'=>$request->email,
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
            Mail::to($request->email)->send(new NewsletterUserMail());
            return response()->json(['status'=>'success', 'msg'=>'Thanks for Subscribed us.']);
        }
    }


    public function contactIndex(){
        return view('frontend.contact');
    }

    public function contactStore(Request $request){
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'message'=>'required',
        ]);
        $message = DB::table('contacts')->insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>$request->message,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        // Mail::to('admin@admin.com')->send(new ContactAdminMail($message));
        // Mail::to($request->email)->send(new ContactUserMail());
        return response()->json(['status'=>'success']);
    }
}
