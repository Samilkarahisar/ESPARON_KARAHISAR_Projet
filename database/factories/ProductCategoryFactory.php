<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ProductCategory;
use Faker\Generator as Faker;

$factory->define(ProductCategory::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->word)
    ];
});
