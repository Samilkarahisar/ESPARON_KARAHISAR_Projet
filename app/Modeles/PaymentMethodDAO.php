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

    public function createObject($stdObject) {
        if(is_null($stdObject)) {
            return null;
        }

        $paymentMethod = new PaymentMethod();

        $paymentMethod->setId($stdObject->id);
        $paymentMethod->setName($stdObject->name);
        $paymentMethod->setDescription($stdObject->description);
        $paymentMethod->setImage($stdObject->image);

        return $paymentMethod;
    }
}
