<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ProductImage;
use Faker\Generator as Faker;

$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        'image'=>$faker->ImageUrl(250, 250),
        /**
         * Clave foranea
         */
        'product_id'=>$faker->numberBetween(1, 100)
    ];
});
