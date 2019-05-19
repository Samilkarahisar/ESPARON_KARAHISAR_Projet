<?php

namespace App\Business;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public $timestamps = false;

    private $id;
    private $user;
    private $billing_address;
    private $shipping_address;
    private $payment_method;
    private $status;
    private $date;
    private $total;
    private $registered;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->user = new User();
        $this->billing_address = new Address();
        $this->shipping_address = new Address();
        $this->payment_method = new PaymentMethod();
        $this->status = 0;
        $this->date = now();
        $this->total = 0;
        $this->registered = 0;
    }

    public function getId() {
        return $this->id;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getTotal() {
        return $this->total;
    }

    public function getDate() {
        return $this->date;
    }

    public function getRegistered()
    {
        return $this->registered;
    }

    public function getUser() {
        return $this->user;
    }

    public function getBillingAddress() {
        return $this->billing_address;
    }

    public function getShippingAddress() {
        return $this->shipping_address;
    }

    public function getPaymentMethod() {
        return $this->payment_method;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function setRegistered($registered) {
        $this->registered = $registered;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setBillingAddress($billingAddress) {
        $this->billing_address = $billingAddress;
    }

    public function setShippingAddress($shippingAddress) {
        $this->shipping_address = $shippingAddress;
    }

    public function setPaymentMethod($paymentMethod) {
        $this->payment_method = $paymentMethod;
    }
}
