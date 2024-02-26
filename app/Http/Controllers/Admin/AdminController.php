<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showLogin() {
        return view('admin.auth.login');
    }

    public function showDashboard() {
        $products = DB::table('products')->count();
        $category = DB::table('categories')->count();
        $category += DB::table('sub_categories')->count();
        $category += DB::table('child_categories')->count();
        $brands = DB::table('brands')->count();
        $users = DB::table('users')->count();
        $total_orders = DB::table('orders')->count();
        $pending = DB::table('orders')->where('order_status','pending')->count();
        $received = DB::table('orders')->where('order_status','received')->count();
        $deliverd = DB::table('orders')->where('order_status','delivered')->count();
        $returned = DB::table('orders')->where('order_status','returned')->count();
        $shipped = DB::table('orders')->where('order_status','shipped')->count();

        $cashOnDelivey1 = collect(DB::table('orders')->where('payment_type','cash-on-delivery')->get());
        $cashOnDelivey2 = collect(DB::table('orders')->where('coupon_after_discount',null)->where('payment_type','cash-on-delivery')->get());
        $cashOnDelivey = $cashOnDelivey1->sum('coupon_after_discount') + $cashOnDelivey2->sum('total');

        $aamarPay = collect(DB::table('payment_details')->get());
        $aamarPay = $aamarPay->sum('amount');


        return view('admin.dashboard', compact('products','users','category','brands','total_orders','pending','received','deliverd','returned','shipped','cashOnDelivey','aamarPay'));
    }
    
}
