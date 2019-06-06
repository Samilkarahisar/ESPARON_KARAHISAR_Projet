<?php

namespace App\Modeles;

use App\Business\Product;
use DB;

class ProductDAO extends DAO
{
    public function get($id) {
        $stdObject = DB::table('products')->find($id);
        return $this->createObject($stdObject);
    }

    public function getMany($limit) {
        $stdObjects = DB::table('products')->limit($limit)->get();
        return $this->createArray($stdObjects);
    }

    public function getWithProductCategory($productCategoryId) {
        $stdObjects = DB::table('products')->where('product_category_id', '=', $productCategoryId)->get();
        return $this->createArray($stdObjects);
    }

    public function getSameCategoryProducts($productId, $productCategoryId, $limit) {
        $stdObjects = DB::table('products')->where([['id', '!=', $productId], ['product_category_id', '=', $productCategoryId]])->limit($limit)->get();
        return $this->createArray($stdObjects);
    }

    public function createObject($stdObject) {
        if(is_null($stdObject)) {
            return null;
        }

        $product = new Product();

        $product->setId($stdObject->id);

        $productCategoryDAO = new ProductCategoryDAO();
        $productCategory = $productCategoryDAO->get($stdObject->product_category_id);
        $product->setProductCategory($productCategory);

        $product->setName($stdObject->name);
        $product->setDescription($stdObject->description);
        $product->setImage($stdObject->image);
        $product->setPrice($stdObject->price);

        return $product;
    }
}
