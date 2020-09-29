<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect()->route('admin.home');
        }

        if (Auth::guard($guard)->check()) {
            return redirect()->route(RouteServiceProvider::INDEX);
        }

//
//        if (Auth::guard($guard)->check()) {
//            return redirect(RouteServiceProvider::INDEX);
//        }
//
//        return $next($request);

//        if (Auth::guard($guard)->check()) {
//
//            if($guard == "admin"){
//                //user was authenticated with admin guard.
//                return redirect()->route('admin.home');
//            } else {
//                //default guard.
//                return redirect(RouteServiceProvider::INDEX);
//            }
//
//        }

        return $next($request);







    }
}
