<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order,OrderDetails};

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware(['is_admin.auth','is_admin']);
    }

    public function index(){
        $query = Order::query();
        $orders = $query->latest()->get();
        return view('admin.orders.all-orders',compact('orders'));
    }

    public function show(string $id){
        $order = Order::where('id', $id)->first();
        $order_details = OrderDetails::where('order_id', $id)->get();
        return view('admin.orders.order-details',compact('order','order_details'));
    }

    public function orderStatusFilter(Request $request){
        $orders = '';
        if($request->val == 'all'){
            $orders = Order::get();
        }else{
            $orders = Order::where('order_status', $request->val)->get();
        }
        return response()->json(['orders'=>$orders, 'order_status'=>$request->val]);
    }

    public function paymentStatusFilter(Request $request){
        $orders = '';
        if($request->val == 'all'){
            $orders = Order::get();
        }else{
            $orders = Order::where('payment_status', $request->val)->get();
        }
        return response()->json(['orders'=>$orders, 'payment_status'=>$request->val]);
    }

    public function paymentTypeFilter(Request $request){
        $orders = '';
        if($request->val == 'all'){
            $orders = Order::get();
        }else{
            $orders = Order::where('payment_type', $request->val)->get();
        }
        return response()->json(['orders'=>$orders, 'payment_type'=>$request->val]);
    }
}
