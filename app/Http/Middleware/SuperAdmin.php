<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'super-admin') {
            return $next($request);
        }
        if(Session::has('is_stealth_login')) {
            Session::forget('is_stealth_login');
            Session::forget('super_admin_id');
        }
        Auth::logout();
        return redirect('login');
    }
}
