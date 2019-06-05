<?php

namespace App\Http\Controllers;

use App\Modeles\OrderDAO;
use App\Modeles\OrderProductDAO;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $orderProductDAO = new OrderProductDAO();
        $orderProductsUnfiltered = $orderProductDAO->getAllForAdmin();
        $orderProductsFiltered = array();
        foreach($orderProductsUnfiltered as $orderProduct) {
            $orderProductsFiltered[$orderProduct->getOrder()->getId()][] = $orderProduct;
        }
        return view('admin.index', compact('orderProductsFiltered'));
    }

    public function confirm(Request $request)
    {
        $orderId = $request->post('orderId');

        $orderDAO = new OrderDAO();
        $order = $orderDAO->get($orderId);
        $order->setStatus(3);
        $orderDAO->modify($order);

        return;
    }
}
