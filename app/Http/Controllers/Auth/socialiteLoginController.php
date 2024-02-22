<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class socialiteLoginController extends Controller
{
    public function googleAuthRedirect(){
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function googleAuthCallback(){
        $googleUser = Socialite::driver('google')->stateless()->user();
        $user = User::where('email',$googleUser->email)->first();
        if($user){
            $user->update([
                'name' => $googleUser->name,
                'avatar' => $googleUser->avatar,
                'token' => $googleUser->token,
                'refresh_token' => $googleUser->refreshToken,
            ]);
        }else{
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'avatar' => $googleUser->avatar,
                'token' => $googleUser->token,
                'refresh_token' => $googleUser->refreshToken,
            ]); 
        }
 
        Auth::login($user);
 
        return redirect()->route('home');
    }
}
