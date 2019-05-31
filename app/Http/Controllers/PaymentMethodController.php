<?php

namespace App\Http\Controllers;

use function App\Helpers\getCurrentOrder;
use App\Modeles\OrderDAO;
use App\Modeles\PaymentMethodDAO;

class PaymentMethodController extends Controller
{
    public function index() {
        $paymentMethodDAO = new PaymentMethodDAO();
        $paymentMethods = $paymentMethodDAO->getAll();

        return view('payment_method.index', compact(['paymentMethods']));
    }

    public function paypal() {
        $order = getCurrentOrder();
        $paymentMethodDAO = new PaymentMethodDAO();
        $paymentMethod = $paymentMethodDAO->getWithName('PayPal');
        $order->setPaymentMethod($paymentMethod);
        $order->setStatus(2);
        $orderDAO = new OrderDAO();
        $orderDAO->modify($order);

        return view('payment_method.paypal');
    }

    public function creditCard() {
        $order = getCurrentOrder();
        $paymentMethodDAO = new PaymentMethodDAO();
        $paymentMethod = $paymentMethodDAO->getWithName('Carte Bancaire');
        $order->setPaymentMethod($paymentMethod);
        $order->setStatus(2);
        $orderDAO = new OrderDAO();
        $orderDAO->modify($order);

        return view('payment_method.credit_card');
    }

    public function bill() {
        $order = getCurrentOrder();
        $paymentMethodDAO = new PaymentMethodDAO();
        $paymentMethod = $paymentMethodDAO->getWithName('Chèque');
        $order->setPaymentMethod($paymentMethod);
        $order->setStatus(2);
        $orderDAO = new OrderDAO();
        $orderDAO->modify($order);

        return view('payment_method.bill');
    }

    public function success() {
        return view('payment_method.success');
    }
}
