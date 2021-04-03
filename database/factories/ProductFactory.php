<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => substr($faker->sentence(3), 0, -1),
        'description' => $faker->sentence(10),
        'long_descripction' => $faker->text,
        'price' => $faker->randomFloat(2, 5, 150),
        'category_id' => $faker->numberBetween(1, 5),
        'code' => $faker->unique(true)->numberBetween(1, 50),
        'packaging' => $faker->numberBetween(1, 3),
        'min_sale' => $faker->randomElement(['1', '6', '12']),
        'stock' => $faker->numberBetween(1, 1000)
    ];
});
