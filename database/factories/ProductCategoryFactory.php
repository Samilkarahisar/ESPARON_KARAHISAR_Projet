<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define('App\Business\ProductCategory', function (Faker $faker) {
    return [
        'name' => ucfirst($faker->word)
    ];
});
