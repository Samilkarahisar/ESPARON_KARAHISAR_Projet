<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define('App\Business\Address', function (Faker $faker) {
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
