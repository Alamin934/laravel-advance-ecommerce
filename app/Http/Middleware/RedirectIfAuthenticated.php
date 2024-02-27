<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = $request->user();
                if(auth()->user()->is_admin === 1 || $user->hasRole('admin') || $user->hasRole('moderator') || $user->hasRole('editor')){
                    return redirect()->intended('admin/dashboard');
                }
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
