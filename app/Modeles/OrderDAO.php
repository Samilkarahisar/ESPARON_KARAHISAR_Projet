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
        $paymentMethodDAO = new PaymentMethodDAO();

        $hasBillingAddress = !is_null($order->getBillingAddress());
        $hasShippingAddress = !is_null($order->getShippingAddress());
        $hasPaymentMethod = !is_null($order->getPaymentMethod());

        if($hasBillingAddress) {
            if (!$addressDAO->get($order->getBillingAddress()->getId())) {
                $billingAddressId = $addressDAO->insert($order->getBillingAddress());
                $order->getBillingAddress()->setId($billingAddressId);
            } else {
                $addressDAO->modify($order->getBillingAddress());
            }
        }

        if($hasShippingAddress) {
            if (!$addressDAO->get($order->getShippingAddress()->getId())) {
                $shippingAddressId = $addressDAO->insert($order->getShippingAddress());
                $order->getShippingAddress()->setId($shippingAddressId);
            } else {
                $addressDAO->modify($order->getShippingAddress());
            }
        }

        if($hasPaymentMethod) {
            if (!$paymentMethodDAO->get($order->getPaymentMethod()->getId())) {
                $paymentMethodId = $paymentMethodDAO->insert($order->getPaymentMethod());
                $order->getPaymentMethod()->setId($paymentMethodId);
            } else {
                $paymentMethodDAO->modify($order->getPaymentMethod());
            }
        }

        return DB::table('orders')
            ->where('id', '=', $order->getId())
            ->update([
                'user_id' => $order->getUser()->getId(),
                'billing_address_id' => $hasBillingAddress ? $order->getBillingAddress()->getId() : null,
                'shipping_address_id' => $hasShippingAddress ? $order->getShippingAddress()->getId() : null,
                'payment_method_id' => $order->getPaymentMethod()->getId(),
                'status' => $order->getStatus(),
                'date' => $order->getDate(),
                'total' => $order->getTotal(),
                'registered' => $order->getRegistered()
            ]);
    }

    public function insert(Order $order) {
        if(DB::table('orders')->find($order->getId())) {
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
