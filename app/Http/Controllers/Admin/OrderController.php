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
        $orders = Order::latest()->get();
        return view('admin.orders.all-orders',compact('orders'));
    }

    public function show(string $id){
        $order = Order::where('id', $id)->first();
        $order_details = OrderDetails::where('order_id', $id)->get();
        return view('admin.orders.order-details',compact('order','order_details'));
    }
}
