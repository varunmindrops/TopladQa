<?php

namespace App\Http\Middleware;

use Closure;

class Counsellor
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
        if (Auth::check() && Auth::user()->role == 'counsellor') {
            return $next($request);
        }
        Auth::logout();
        return redirect('login');
    }
}
