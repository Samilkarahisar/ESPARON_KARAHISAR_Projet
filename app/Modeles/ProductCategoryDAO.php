<?php

namespace App\Modeles;

use App\Business\ProductCategory;
use DB;

class ProductCategoryDAO extends DAO
{
    public function get($id) {
        $stdObject = DB::table('product_categories')->find($id);
        return $this->createObject($stdObject);
    }

    public function getAll() {
        $stdObjects = DB::table('product_categories')->get();
        return $this->createArray($stdObjects);
    }

    public function createObject($stdObject) {
        if(is_null($stdObject)) {
            return null;
        }

        $productCategory = new ProductCategory();

        $productCategory->setId($stdObject->id);
        $productCategory->setName($stdObject->name);

        return $productCategory;
    }
}
