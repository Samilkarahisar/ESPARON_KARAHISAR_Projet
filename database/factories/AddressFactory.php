<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'street_1' => $faker->streetAddress,
        'street_2' => $faker->address,
        'street_3' => $faker->address,
        'zip_code' => $faker->postcode,
        'city' => $faker->city,
        'country' => $faker->country
    ];
});
