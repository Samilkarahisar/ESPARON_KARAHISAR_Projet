<?php

namespace App\Http\Middleware;

use function App\Helpers\getCurrentOrder;
use Closure;

class CheckOrderStatus
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
        $order = getCurrentOrder();
        $orderStatus = $order->getStatus();
        if($orderStatus < 1) {
            return redirect('/');
        }

        return $next($request);
    }

}
