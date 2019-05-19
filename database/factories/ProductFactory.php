<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define('App\Business\Product', function (Faker $faker) {
    return [
        'product_category_id' => factory('App\Business\ProductCategory')->create()->id,
        'name' => ucfirst($faker->word),
        'description' => $faker->realText(),
        'image' => 'https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/14.jpg',
        'price' => $faker->randomFloat(2, 1, 15)
    ];
});
