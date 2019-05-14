<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    /**
     * Show bag.
     */
    public function index()
    {
        $order = ($user = Auth::user()) ? $user->getCurrentOrder() : Order::find(session('orderId'));

        $products = $order->products;
        $totalOrder = $order->total;

        return view('shopping_bag.index', compact(['products', 'totalOrder']));
    }

    /**
     * Add a product to the bag.
     * Ajax
     *
     * @return void
     */
    public function update(Request $request)
    {
        $ordersProducts = $request->post('ordersProducts');

        foreach($ordersProducts as $orderProduct) {
            $idToUpdate = $orderProduct['name'];
            if($orderProductToUpdate = OrderProduct::find($idToUpdate)) {
                $orderProductToUpdate->quantity = $orderProduct['value'];
                $orderProductToUpdate->save();
            }
        }

        return;
    }

    /**
     * Add a product to the bag.
     * Ajax
     *
     * @return void
     */
    public function add(Request $request)

    {
        $productId = $request->post('productId');
        $quantity = $request->post('quantity');
        $order = ($user = Auth::user()) ? $user->getCurrentOrder() : Order::find(session('orderId'));
        $orderProduct = OrderProduct::where(['product_id' => $productId, 'order_id' => $order->id])->first();
        if($orderProduct) {
            $orderProduct->quantity += $quantity;
            $orderProduct->save();
        } else {
            $newOrderProduct = new OrderProduct;
            $newOrderProduct->order_id = $order->id;
            $newOrderProduct->product_id = $productId;
            $newOrderProduct->quantity = $quantity;
            $newOrderProduct->save();
        }

        return;
    }

    /**
     * Delete a product from the bag.
     * Ajax
     *
     * @return void
     */
    public function delete(Request $request)

    {
        $orderProductId = $request->post('orderProductId');
        $orderProduct = OrderProduct::find($orderProductId);
        $orderProduct->delete();

        return;
    }
}
