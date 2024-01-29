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
        ]);

        return response()->json(['status'=> 'success']);
    }
}
