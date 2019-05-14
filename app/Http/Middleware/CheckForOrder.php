<?php

namespace App\Http\Middleware;

use App\Order;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckForOrder
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
        if(Auth::guest()) {
            if(!session()->has('orderId') || !Order::find(session('orderId'))) {
                $order = new Order;
                $order->save();
                session(['orderId' => $order->id]);
            }
        }

        return $next($request);
    }
}
