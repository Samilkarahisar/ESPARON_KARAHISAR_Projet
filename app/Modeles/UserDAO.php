<?php

namespace App\Modeles;

use App\Business\User;
use DB;

class UserDAO extends DAO
{
    public function get($id) {
        $stdObject = DB::table('users')->find($id);
        return $this->createObject($stdObject);
    }

    public function insert(User $user) {
        if($this->get($user->getId())) {
            return $user->getId();
        }

        $addressDAO = new AddressDAO();
        $addressId = $addressDAO->insert($user->getAddress());

        return DB::table('users')
            ->insertGetId([
                'address_id' => $addressId,
                'first_name' => $user->getFirstName(),
                'last_name' => $user->getLastName(),
                'email' => $user->getEmail(),
                'password' => $user->getPassword(),
                'is_admin' => $user->getIsAdmin()
            ]);
    }

    public function createObject($stdObject) {
        if(is_null($stdObject)) {
            return new User();
        }

        $user = new User();

        $user->setId($stdObject->id);
        $user->setFirstName($stdObject->first_name);
        $user->setLastName($stdObject->last_name);
        $user->setEmail($stdObject->email);
        $user->setPassword($stdObject->password);
        $user->setIsAdmin($stdObject->is_admin);

        $addressDAO = new AddressDAO();
        $address = $addressDAO->get($stdObject->address_id);
        $user->setAddress($address);

        return $user;
    }
}
