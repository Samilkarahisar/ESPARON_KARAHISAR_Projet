<?php

namespace App\Business;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public $timestamps = false;

    private $id;
    private $product_category;
    private $name;
    private $description;
    private $image;
    private $price;

    public function getId() {
        return $this->id;
    }

    public function getProductCategory() {
        return $this->product_category;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getImage() {
        return $this->image;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setProductCategory($productCategory) {
        $this->product_category = $productCategory;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
}
