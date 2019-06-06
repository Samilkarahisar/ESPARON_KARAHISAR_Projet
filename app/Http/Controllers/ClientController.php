<?php

namespace App\Http\Controllers;

use App\Business\Address;
use function App\Helpers\getCurrentOrder;
use App\Http\Requests\StoreAddresses;
use App\Modeles\OrderDAO;
use App\Modeles\UserDAO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function useAddress(Request $request) {
        $userDAO = new UserDAO();
        $user = $userDAO->get(Auth::user()->id);
        $address = $user->getAddress();

        $addressStd = new \stdClass();
        $addressStd->first_name = $address->getFirstName();
        $addressStd->last_name = $address->getLastName();
        $addressStd->street_1 = $address->getStreet1();
        $addressStd->street_2 = $address->getStreet2();
        $addressStd->zip_code = $address->getZipCode();
        $addressStd->city = $address->getCity();
        $addressStd->country = $address->getCountry();

        $addressJson = json_encode($addressStd);
        return $addressJson;
    }
}
