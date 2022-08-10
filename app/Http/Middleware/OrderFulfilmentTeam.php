<?php

namespace App\Http\Middleware;

use Closure;

class OrderFulfilmentTeam
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
        if (Auth::check() && Auth::user()->role == 'order-fulfilment-team') {
            return $next($request);
        }
        Auth::logout();
        return redirect('login');
    }
}
