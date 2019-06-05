<?php

namespace App\Http\Controllers;

use App\Business\Address;
use function App\Helpers\getCurrentOrder;
use App\Http\Requests\StoreAddresses;
use App\Modeles\OrderDAO;

class ClientController extends Controller
{
    public function fillAddresses()
    {
        return view('client.fill_addresses');
    }

    public function postFillAddresses(StoreAddresses $request) {
        $order = getCurrentOrder();

        $shippingAddress = $order->getShippingAddress();
        if(is_null($shippingAddress)) {
            $order->setShippingAddress(new Address());
            $shippingAddress = $order->getShippingAddress();
        }

        $billingAddress = $order->getBillingAddress();
        if(is_null($billingAddress)) {
            $order->setBillingAddress(new Address());
            $billingAddress = $order->getBillingAddress();
        }

        $shippingAddress->setFirstName($request->input('shipping_address.first_name'));
        $shippingAddress->setLastName($request->input('shipping_address.last_name'));
        $shippingAddress->setStreet1($request->input('shipping_address.street_1'));
        $shippingAddress->setStreet2($request->input('shipping_address.street_2'));
        $shippingAddress->setZipCode($request->input('shipping_address.zip_code'));
        $shippingAddress->setCity($request->input('shipping_address.city'));
        $shippingAddress->setCountry($request->input('shipping_address.country'));

        $billingAddress->setFirstName($request->input('billing_address.first_name'));
        $billingAddress->setLastName($request->input('billing_address.last_name'));
        $billingAddress->setStreet1($request->input('billing_address.street_1'));
        $billingAddress->setStreet2($request->input('billing_address.street_2'));
        $billingAddress->setZipCode($request->input('billing_address.zip_code'));
        $billingAddress->setCity($request->input('billing_address.city'));
        $billingAddress->setCountry($request->input('billing_address.country'));

        $order->setStatus(1);

        $orderDAO = new OrderDAO();
        $orderDAO->modify($order);

        return redirect()->route('payment_method');
    }
}
