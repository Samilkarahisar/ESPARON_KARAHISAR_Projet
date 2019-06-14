<?php

namespace App\Http\Controllers;

use function App\Helpers\getCurrentOrder;
use App\Modeles\OrderDAO;
use App\Modeles\PaymentMethodDAO;
use Illuminate\Support\Facades\Auth;

class PaymentMethodController extends Controller
{
    public function index() {
        $paymentMethodDAO = new PaymentMethodDAO();
        $paymentMethods = $paymentMethodDAO->getAll();

        return view('payment_method.index', compact(['paymentMethods']));
    }

    public function paypal() {
        return view('payment_method.paypal');
    }

    public function creditCard() {
        return view('payment_method.credit_card');
    }

    public function bill() {
        $order = getCurrentOrder();
        $paymentMethodDAO = new PaymentMethodDAO();
        $paymentMethod = $paymentMethodDAO->getWithName('Chèque');
        $order->setPaymentMethod($paymentMethod);
        $order->setStatus(2);
        $date = new \DateTime();
        $order->setDate($date->format('Y-m-d'));
        $orderDAO = new OrderDAO();
        $orderDAO->modify($order);

        if(Auth::guest() && session()->has('orderId')) {
            session()->forget('orderId');
        }

        return view('payment_method.bill');
    }

    public function successPayPal() {
        $order = getCurrentOrder();
        $paymentMethodDAO = new PaymentMethodDAO();
        $paymentMethod = $paymentMethodDAO->getWithName('PayPal');
        $order->setPaymentMethod($paymentMethod);
        $order->setStatus(2);
        $date = new \DateTime();
        $order->setDate($date->format('Y-m-d'));
        $orderDAO = new OrderDAO();
        $orderDAO->modify($order);

        if(Auth::guest() && session()->has('orderId')) {
            session()->forget('orderId');
        }

        return view('payment_method.success');
    }

    public function successCreditCard() {
        $order = getCurrentOrder();
        $paymentMethodDAO = new PaymentMethodDAO();
        $paymentMethod = $paymentMethodDAO->getWithName('Carte Bancaire');
        $order->setPaymentMethod($paymentMethod);
        $order->setStatus(2);
        $date = new \DateTime();
        $order->setDate($date->format('Y-m-d'));
        $orderDAO = new OrderDAO();
        $orderDAO->modify($order);

        if(Auth::guest() && session()->has('orderId')) {
            session()->forget('orderId');
        }

        return view('payment_method.success');
    }
}
