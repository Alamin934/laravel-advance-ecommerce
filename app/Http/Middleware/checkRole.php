<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();
        if($user){
            $user_roles = collect($user->roles->pluck('name'))->all();
            if(count(array_intersect($user_roles, $roles))>0){
                return $next($request);
            }
            return redirect()->back()->with(['message'=>'You don not have access.', 'alert-type'=>'error']);
        }
        return redirect()->route('home');
    }
}
