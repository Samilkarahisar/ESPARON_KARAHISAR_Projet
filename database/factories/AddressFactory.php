<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'address1' => $faker->streetAddress,
        'address2' => $faker->address,
        'address3' => $faker->address,
        'postal_code' => $faker->postcode,
        'city' => $faker->city,
        'country' => $faker->country
    ];
});
