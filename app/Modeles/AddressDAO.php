<?php

namespace App\Modeles;

use App\Business\Address;
use DB;

class AddressDAO extends DAO
{
    public function get($id) {
        $stdObject = DB::table('addresses')->find($id);
        return $this->createObject($stdObject);
    }

    public function insert(Address $address) {
        if($this->get($address->getId())) {
            $address->getId();
        }

        return DB::table('addresses')
            ->insertGetId([
                'first_name' => $address->getFirstName(),
                'last_name' => $address->getLastName(),
                'street_1' => $address->getStreet1(),
                'street_2' => $address->getStreet2(),
                'street_3' => $address->getStreet3(),
                'zip_code' => $address->getZipCode(),
                'city' => $address->getCity(),
                'country' => $address->getCountry()
            ]);
    }

    public function createObject($stdObject) {
        if(is_null($stdObject)) {
            return null;
        }

        $address = new Address();

        $address->setId($stdObject->id);
        $address->setFirstName($stdObject->first_name);
        $address->setLastName($stdObject->last_name);
        $address->setStreet1($stdObject->street_1);
        $address->setStreet2($stdObject->street_2);
        $address->setStreet3($stdObject->street_3);
        $address->setZipCode($stdObject->zip_code);
        $address->setCity($stdObject->city);
        $address->setCountry($stdObject->country);

        return $address;
    }
}
