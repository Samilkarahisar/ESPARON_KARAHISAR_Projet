<?php

namespace App\Modeles;

use App\Business\OrderProduct;
use DB;

class OrderProductDAO extends DAO
{
    public function get($id) {
        $stdObject = DB::table('orders_products')->find($id);
        return $this->createObject($stdObject);
    }

    public function modify($orderProduct) {
        DB::table('orders_products')
            ->where('id', '=', $orderProduct->getId())
            ->update(['order_id' => $orderProduct->getOrder()->getId(),
                'product_id' => $orderProduct->getProduct()->getId(),
                'quantity' => $orderProduct->getQuantity()]);
    }

    public function insert($orderProduct) {
        DB::table('orders_products')
            ->insert(['order_id' => $orderProduct->getOrder()->getId(),
                'product_id' => $orderProduct->getProduct()->getId(),
                'quantity' => $orderProduct->getQuantity()]);
    }

    public function remove($id) {
        DB::table('orders_products')
            ->where('id', '=', $id)->delete();
    }

    public function getWithOrderAndProduct($orderId, $productId) {
        $stdObject = DB::table('orders_products')->where(['order_id' => $orderId, 'product_id' => $productId])->first();
        return $this->createObject($stdObject);
    }

    public function getWithOrder($orderId) {
        $stdObjects = DB::table('orders_products')->where('order_id', '=', $orderId)->get();
        return $this->createArray($stdObjects);
    }

    public function createObject($stdObject) {
        if(is_null($stdObject)) {
            return null;
        }

        $orderProduct = new OrderProduct();

        $orderProduct->setId($stdObject->id);

        $orderDAO = new OrderDAO();
        $order = $orderDAO->get($stdObject->order_id);
        $orderProduct->setOrder($order);

        $productDAO = new ProductDAO();
        $product = $productDAO->get($stdObject->product_id);
        $orderProduct->setProduct($product);

        $orderProduct->setQuantity($stdObject->quantity);

        return $orderProduct;
    }
}
