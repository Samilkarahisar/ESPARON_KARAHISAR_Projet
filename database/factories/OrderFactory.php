<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define('App\Business\Order', function (Faker $faker) {
    return [
        'user_id' => factory('App\Business\User')->create()->id,
        'billing_address_id' => factory('App\Business\Address')->create()->id,
        'shipping_address_id' => factory('App\Business\Address')->create()->id,
        'payment_method_id' => factory('App\Business\PaymentMethod')->create()->id,
        'date' => $faker->date(),
        'total' => $faker->randomFloat(2,1,5)
    ];
});
