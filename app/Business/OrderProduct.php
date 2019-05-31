<?php

namespace App\Business;

use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderProduct extends Pivot
{
    protected $table = 'orders_products';

    public $timestamps = false;

    private $id;
    private $order;
    private $product;
    private $quantity;

    public function getId() {
        return $this->id;
    }

    public function getOrder() {
        return $this->order;
    }

    public function getProduct() {
        return $this->product;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setOrder($order) {
        $this->order = $order;
    }

    public function setProduct($product) {
        $this->product = $product;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function getTotal() {
        return number_format($this->quantity * $this->getProduct()->getPrice(), 2);
    }
}
