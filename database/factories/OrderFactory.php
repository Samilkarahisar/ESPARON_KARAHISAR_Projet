<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class)->create()->id,
        'billing_address_id' => factory(App\Address::class)->create()->id,
        'shipping_address_id' => factory(App\Address::class)->create()->id,
        'payment_method_id' => factory(App\PaymentMethod::class)->create()->id,
        'date' => $faker->date(),
        'total' => $faker->randomFloat(2,1,5)
    ];
});
