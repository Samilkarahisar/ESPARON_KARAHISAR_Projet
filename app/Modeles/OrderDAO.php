<?php

namespace App\Modeles;

use App\Business\Order;
use DB;

class OrderDAO extends DAO
{
    public function get($id) {
        $stdObject = DB::table('orders')->find($id);
        return $this->createObject($stdObject);
    }

    public function modify(Order $order) {
        $addressDAO = new AddressDAO();
        $shippingAddressId = $addressDAO->insert($order->getBillingAddress());
        $billingAddressId = $addressDAO->insert($order->getShippingAddress());
        $order->getBillingAddress()->setId($shippingAddressId);
        $order->getShippingAddress()->setId($billingAddressId);

        return DB::table('orders')
            ->update([
                'user_id' => $order->getUser()->getId(),
                'billing_address_id' => $order->getBillingAddress()->getId(),
                'shipping_address_id' => $order->getShippingAddress()->getId(),
                'payment_method_id' => $order->getPaymentMethod()->getId(),
                'status' => $order->getStatus(),
                'date' => $order->getDate(),
                'total' => $order->getTotal(),
                'registered' => $order->getRegistered()
            ]);
    }

    public function insert(Order $order) {
        if($this->get($order->getId())) {
            return $order->getId();
        }

        return DB::table('orders')
            ->insertGetId([
                'user_id' => $order->getUser()->getId(),
                'billing_address_id' => $order->getBillingAddress()->getId(),
                'shipping_address_id' => $order->getShippingAddress()->getId(),
                'payment_method_id' => $order->getPaymentMethod()->getId(),
                'status' => $order->getStatus(),
                'date' => $order->getDate(),
                'total' => $order->getTotal(),
                'registered' => $order->getRegistered()
            ]);
    }

    public function getUserCurrent($userId) {
        $stdObject = DB::table('orders')->where([['user_id', '=', $userId], ['status', '<', 2]])->first();
        return $this->createObject($stdObject);
    }

    public function getAllForAdmin() {
        $stdObjects = DB::table('orders')->where('status', '=', 2)->get();
        return $this->createArray($stdObjects);
    }

    public function createObject($stdObject) {
        if(is_null($stdObject)) {
            return null;
        }

        $order = new Order();

        $order->setId($stdObject->id);
        $order->setStatus($stdObject->status);
        $order->setTotal($stdObject->total);
        $order->setDate($stdObject->date);
        $order->setRegistered($stdObject->registered);

        $userDAO = new UserDAO();
        $user = $userDAO->get($stdObject->user_id);
        $order->setUser($user);

        $addressDAO = new AddressDAO();
        $billingAddress = $addressDAO->get($stdObject->billing_address_id);
        $order->setBillingAddress($billingAddress);
        $shippingAddress = $addressDAO->get($stdObject->shipping_address_id);
        $order->setShippingAddress($shippingAddress);

        $paymentMethodDAO = new PaymentMethodDAO();
        $paymentMethod = $paymentMethodDAO->get($stdObject->payment_method_id);
        $order->setPaymentMethod($paymentMethod);

        return $order;
    }
}
