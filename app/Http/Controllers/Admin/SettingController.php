<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    
    public function stmpIndex(){
        $smtp = DB::table('smtps')->first();
        return view('admin.settings.smtp', compact('smtp'));
    }


    public function stmpUpdate(Request $request, string $id){
        $validated = $request->validate([
            'mail_mailer' => 'required',
            'mail_host' => 'required',
            'mail_port' => 'required',
            'mail_username' => 'required',
            'mail_password' => 'required',
        ]);

        $smtp = DB::table('smtps')->where('id', $id)->update([
            'mail_mailer' => $request->mail_mailer,
            'mail_host' => $request->mail_host,
            'mail_port' => $request->mail_port,
            'mail_username' => $request->mail_username,
            'mail_password' => Hash::make($request->mail_password),
            'mail_from_address' => $request->mail_from_address,
        ]);

        $notification = ['message'=>'SMTP Updated Successfully', 'alert-type'=>'success'];
        return redirect()->back()->with($notification);
    }

    public function bdPaymentGetwayInfo(){
        $aamarPay = DB::table('bd_payment_getway_info')->where('getway_name', 'aamarPay')->first();
        $sslcommerze = DB::table('bd_payment_getway_info')->where('getway_name', 'sslcommerze')->first();
        return view('admin.settings.bd-payment-getway-setup',compact('aamarPay','sslcommerze'));
    }

    public function storeBdPaymentGetway(Request $request){
        $validated = $request->validate([
            'store_id' => 'required',
            'secret_key' => 'required',
        ]);

        DB::table('bd_payment_getway_info')->upsert(
            [
                'getway_name'=>$request->getway_name,
                'store_id'=>$request->store_id,
                'secret_key'=>$request->secret_key,
                'status'=>$request->status,
            ],
            ['getway_name'],
            ['store_id','secret_key','status']
        );

        return response()->json(['status'=>'success'], 200);
    }
    public function deleteBdPaymentGetway(Request $request){
        DB::table('bd_payment_getway_info')->where('getway_name', $request->getway_name)->delete();
        return response()->json(['status'=>'success'], 200);
    }
}
