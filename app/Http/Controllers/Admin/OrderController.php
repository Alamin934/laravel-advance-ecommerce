<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Order,OrderDetails};
use App\Mail\UpdateOrderStatusMail;
use Illuminate\Support\Facades\Mail;

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

    public function edit(string $id){
        $order = Order::findOrFail($id);
        return response()->json($order);
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

    public function updateStatus(Request $request){
        Order::where('id', $request->order_id)->update([
            'order_status' => $request->order_status,
            'payment_status' => $request->payment_status,
        ]);

        $data = [];
        $data['order'] = Order::find($request->order_id);
        if($request->order_status == 'shipped'){
            $data['status'] = "Your Order has been Shipped";
            Mail::to($request->email)->send(new UpdateOrderStatusMail($data));
        }
        if($request->order_status == 'delivered'){
            $data['status'] = "Your Order has been Deliverd";
            Mail::to($request->email)->send(new UpdateOrderStatusMail($data));
        }

        return response()->json(['status'=>'success']);
    }
}
