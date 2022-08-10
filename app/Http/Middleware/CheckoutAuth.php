<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckoutAuth
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
        if(Auth::check()) {
            if(Auth()->user()->role == 'student') {
                return $next($request);
            } 
            Auth::logout();
            return redirect('/student/checkout-login')->with('error', 'Please login as a student.');
        } 
        return redirect('/student/checkout-login');
    }
}
