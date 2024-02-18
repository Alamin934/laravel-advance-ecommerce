<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function settings(){
        $shipping = DB::table('shippings')->latest()->first();
        return view('frontend.dashboard.settings',compact('shipping'));
    }

    public function shippingStore(Request $request){
        $validated = $request->validate([
            'name' =>'required',
            'email' =>'required',
            'phone' =>'required',
            'address' =>'required',
            'city' =>'required',
            'state' =>'required',
            'postal_code' =>'required',
            'country' =>'required',
        ]);

        DB::table('shippings')->upsert(
            [
                'user_id'=>auth()->user()->id,
                'name' =>$request->name,
                'email' =>$request->email,
                'phone' =>$request->phone,
                'address' =>$request->address,
                'city' =>$request->city,
                'state' =>$request->state,
                'postal_code' =>$request->postal_code,
                'country' =>$request->country,
                'created_at' =>now(),
                'updated_at' =>now(),
            ],
            ['email'],
            [
                'name',
                'phone',
                'address',
                'city',
                'state',
                'postal_code',
                'country',
                'created_at',
                'updated_at',
            ]
        );
        
        return response()->json(['status'=>'success']);
    }
}
