<?php

namespace App\Http\Middleware;

use App\Business\Order;
use App\Modeles\OrderDAO;
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
            $orderDAO = new OrderDAO();
            if(!session()->has('orderId') || !$orderDAO->get(session('orderId'))) {
                $order = new Order();
                $id = $orderDAO->insert($order);
                session(['orderId' => $id]);
            }
        }

        return $next($request);
    }
}
