<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    public function index(){
        $coupons = DB::table('coupons')->get();
        return view('admin.offers.coupon.coupon', compact('coupons'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'coupon_code' => 'required',
            'valid_date' => 'required',
            'coupon_amount' => 'required',
            'coupon_status' => 'required',
        ]);

        
        $coupon = DB::table('coupons')->insert([
            'coupon_code' => $request->coupon_code,
            'valid_date' => $request->valid_date,
            'type' => 'Fixed',
            'amount' => $request->coupon_amount,
            'status' => $request->coupon_status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['status'=> 'success']);
    }

    public function edit(Request $request){
        $coupon = DB::table('coupons')->where('id', $request->id)->get();
        return response()->json(['status'=>'success', 'data' => $coupon]);
    }

    public function update(Request $request){
        $validated = $request->validate([
            'up_coupon_code' => 'required',
            'up_valid_date' => 'required',
            'up_coupon_amount' => 'required',
            'up_coupon_status' => 'required',
        ]);

        $coupon = DB::table('coupons')->where('id', $request->up_id)->update([
            'coupon_code' => $request->up_coupon_code,
            'valid_date' => $request->up_valid_date,
            'type' => 'Fixed',
            'amount' => $request->up_coupon_amount,
            'status' => $request->up_coupon_status,
            'updated_at' => now(),
        ]);
        return response()->json(['status'=> 'success']);
    }
    
    public function destroy(Request $request){
        $coupon = DB::table('coupons')->where('id', $request->id)->delete();
        return response()->json(['status'=> 'success']);
    }
}
