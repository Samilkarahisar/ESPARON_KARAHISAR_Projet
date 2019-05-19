<?php

namespace App\Http\Middleware;

use App\Business\Order;
use function App\Helpers\getCurrentOrder;
use App\Modeles\OrderDAO;
use App\Modeles\UserDAO;
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
        } else {
            if(!getCurrentOrder()) {
                $userDAO = new UserDAO();
                $user = $userDAO->createObject(Auth::user());
                $orderDAO = new OrderDAO();
                $order = new Order();
                $order->setUser($user);
                $orderDAO->insert($order);
            }
        }

        return $next($request);
    }
}
