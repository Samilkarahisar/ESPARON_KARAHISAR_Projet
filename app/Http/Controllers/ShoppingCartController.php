<?php

namespace App\Http\Controllers;

use function App\Helpers\getCurrentOrder;
use App\Business\OrderProduct;
use App\Modeles\OrderProductDAO;
use App\Modeles\ProductDAO;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    /**
     * Show bag.
     */
    public function index()
    {
        $order = getCurrentOrder();

        $orderProductDAO = new OrderProductDAO();
        $orderProducts = $orderProductDAO->getWithOrder($order->getId());
        $totalOrder = $order->getTotal();

        return view('shopping_bag.index', compact(['orderProducts', 'totalOrder']));
    }

    public function update(Request $request)
    {
        $ordersProducts = $request->post('ordersProducts');

        $orderProductDAO = new OrderProductDAO();

        foreach($ordersProducts as $orderProduct) {
            $idToUpdate = $orderProduct['name'];
            $newQuantity = $orderProduct['value'];
            $orderProduct = $orderProductDAO->get($idToUpdate);
            $orderProduct->setQuantity($newQuantity);
            $orderProductDAO->modify($orderProduct);
        }

        return;
    }

    public function add(Request $request)
    {
        $productId = $request->post('productId');
        $quantity = $request->post('quantity');

        $order = getCurrentOrder();

        $orderProductDAO = new OrderProductDAO();
        if($orderProduct = $orderProductDAO->getWithOrderAndProduct($order->getId(), $productId)) {
            $orderProduct->setQuantity($orderProduct->getQuantity() + $quantity);
            $orderProductDAO->modify($orderProduct);
        } else {
            $newOrderProduct = new OrderProduct();

            $newOrderProduct->setOrder($order);

            $productDAO = new ProductDAO();
            $product = $productDAO->get($productId);
            $newOrderProduct->setProduct($product);

            $newOrderProduct->setQuantity($quantity);

            $orderProductDAO->insert($newOrderProduct);
        }

        return;
    }

    public function delete(Request $request)
    {
        $orderProductId = $request->post('orderProductId');
        $orderProductDAO = new OrderProductDAO();
        $orderProductDAO->remove($orderProductId);

        return;
    }
}
