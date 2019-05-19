<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define('App\Business\PaymentMethod', function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->realText(),
        'image' => $faker->imageUrl()
    ];
});
