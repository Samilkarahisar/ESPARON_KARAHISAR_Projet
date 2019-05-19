<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define('App\Business\OrderProduct', function (Faker $faker) {
    return [
        'order_id' => factory('App\Business\Order')->create()->id,
        'product_id' => factory('App\Business\Product')->create()->id,
        'quantity' => $faker->randomNumber(1)
    ];
});
