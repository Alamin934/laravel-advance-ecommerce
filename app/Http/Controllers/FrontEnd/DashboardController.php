<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order,OrderDetails};

class DashboardController extends Controller
{
    public function showOrders(){
        if(auth()->user()->is_admin === 1){
            return redirect()->route('admin.dashboard');
        }else{
            $user_id = auth()->user()->id;
            $orders = Order::where('user_id', $user_id)->orderByDesc('id')->take(5)->get();
            $total = Order::where('user_id', $user_id)->count();
            $complete = Order::where('user_id', $user_id)->where('order_status', 'delivered')->count();
            $return = Order::where('user_id', $user_id)->where('order_status', 'returned')->count();
            $cancel = Order::where('user_id', $user_id)->where('order_status', 'canceled')->count();
            return view('frontend.dashboard.dashboard', compact('orders','total','complete','return','cancel'));
        }
    }
    
    public function myOrders(){
        if(auth()->user()->is_admin === 1){
            return redirect()->route('admin.dashboard');
        }else{
            $user_id = auth()->user()->id;
            $orders = Order::where('user_id', $user_id)->orderByDesc('id')->get();
            return view('frontend.dashboard.orders', compact('orders'));
        }
    }
    
    public function orderDetails(string $id){
        if(auth()->user()->is_admin === 1){
            return redirect()->route('admin.dashboard');
        }else{
            $user_id = auth()->user()->id;
            $order = Order::where('user_id', $user_id)->where('id', $id)->first();
            $order_details = OrderDetails::where('user_id', $user_id)->where('order_id', $id)->get();
            return view('frontend.dashboard.order-details', compact('order_details', 'order'));
        }
    }
}
