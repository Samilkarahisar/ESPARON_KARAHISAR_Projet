<?php

namespace App\Http\Controllers;

use App\Modeles\OrderDAO;

class AdminController extends Controller
{

    public function index()
    {
        $orderDAO = new OrderDAO();
        $orders = $orderDAO->getAllForAdmin();
        return view('admin.index', compact('orders'));
    }
}
