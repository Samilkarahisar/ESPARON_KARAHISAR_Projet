<?php

namespace App\Business;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

    protected $table = 'addresses';

    public $timestamps = false;

    private $id;
    private $first_name;
    private $last_name;
    private $street_1;
    private $street_2;
    private $zip_code;
    private $city;
    private $country;

    public function getId() {
        return $this->id;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getStreet1() {
        return $this->street_1;
    }

    public function getStreet2() {
        return $this->street_2;
    }

    public function getZipCode() {
        return $this->zip_code;
    }

    public function getCity() {
        return $this->city;
    }

    public function getCountry() {
        return $this->country;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setFirstName($firstName) {
        $this->first_name = $firstName;
    }

    public function setLastName($lastName) {
        $this->last_name = $lastName;
    }

    public function setStreet1($street1) {
        $this->street_1 = $street1;
    }

    public function setStreet2($street2) {
        $this->street_2 = $street2;
    }

    public function setZipCode($zipCode) {
        $this->zip_code = $zipCode;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setCountry($country) {
        $this->country = $country;
    }

}