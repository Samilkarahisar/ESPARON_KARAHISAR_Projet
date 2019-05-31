<?php

namespace App\Modeles;

use App\Business\PaymentMethod;
use DB;

class PaymentMethodDAO extends DAO
{
    public function get($id) {
        $stdObject = DB::table('payment_methods')->find($id);
        return $this->createObject($stdObject);
    }

    public function getAll() {
        $stdObjects = DB::table('payment_methods')->get();
        return $this->createArray($stdObjects);
    }

    public function getWithName($name) {
        $stdObject = DB::table('payment_methods')->where('name', '=', $name)->first();
        return $this->createObject($stdObject);
    }

    public function createObject($stdObject) {
        if(is_null($stdObject)) {
            return new PaymentMethod();
        }

        $paymentMethod = new PaymentMethod();

        $paymentMethod->setId($stdObject->id);
        $paymentMethod->setName($stdObject->name);
        $paymentMethod->setDescription($stdObject->description);
        $paymentMethod->setImage($stdObject->image);

        return $paymentMethod;
    }
}
