<?php

namespace App\Business;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = 'users';

    public $timestamps = false;

    private $id;
    private $address;
    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $is_admin;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->address = new Address();
        $this->is_admin = false;
    }

    public function getId() {
        return $this->id;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getIsAdmin() {
        return $this->is_admin;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setFirstName($firstName) {
        $this->first_name = $firstName;
    }

    public function setLastName($lastName) {
        $this->last_name = $lastName;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setIsAdmin($isAdmin) {
        $this->is_admin = $isAdmin;
    }

}
