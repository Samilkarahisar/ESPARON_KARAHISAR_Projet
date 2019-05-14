<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'address_id' => factory(App\Address::class)->create()->id,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => 'espkyle@gmail.com',
        //'email_verified_at' => now(),
        'is_admin' => true,
        'password' => '$2y$10$h3EdNEEWVHjk1SVVi.q1x.o2vTLm0wHD3YqoxBCz.N0TgaAOTpQoi', // password
        //'remember_token' => Str::random(10),
    ];
});


