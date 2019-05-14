<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'product_category_id' => factory(App\ProductCategory::class)->create()->id,
        'name' => ucfirst($faker->word),
        'description' => $faker->realText(),
        'image' => 'https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/14.jpg',
        'price' => $faker->randomFloat(2, 1, 15)
    ];
});
