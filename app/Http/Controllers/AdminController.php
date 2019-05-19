<?php

namespace App\Http\Controllers;

use App\Modeles\OrderDAO;

class AdminController extends Controller
{
    /**
     * Show all products that correspond to the product category.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orderDAO = new OrderDAO();
        $orders = $orderDAO->getAllForAdmin();
        return view('admin.index', compact('orders'));
    }
}
