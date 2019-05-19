<?php

namespace App\Helpers;

use App\Modeles\OrderDAO;
use App\Modeles\UserDAO;
use Illuminate\Support\Facades\Auth;

if (!function_exists('getCurrentOrder')) {

    function getCurrentOrder()
    {
        $orderDAO = new OrderDAO();
        if($user = Auth::user()) {
            $userDAO = new UserDAO();
            $user = $userDAO->createObject($user);
            $order = $orderDAO->getUserCurrent($user->getId());
        } else {
            $order = $orderDAO->get(session('orderId'));
        }
        return $order;
    }
}