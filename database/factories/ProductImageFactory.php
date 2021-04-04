<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use App\ProductImage;
use Faker\Generator as Faker;

$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        'image' => $faker->ImageUrl(250, 250),
        'featured' => $faker->boolean(),
        /**
         * Clave foranea
         */
        'product_id' => Product::all()->random()->id
    ];
});
