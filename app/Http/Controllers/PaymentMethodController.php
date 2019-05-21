<?php

namespace App\Http\Controllers;

use App\Modeles\PaymentMethodDAO;

class PaymentMethodController extends Controller
{
    public function index() {
        $paymentMethodDAO = new PaymentMethodDAO();
        $paymentMethods = $paymentMethodDAO->getAll();

        return view('payment_method.index', compact(['paymentMethods']));
    }

    public function paypal() {

    }

    public function creditCard() {

    }

    public function bill() {

    }
}
