<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Brand;
use App\Product;
use App\Category;
use App\Packaging;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => substr($faker->sentence(3), 0, -1),
        'description' => $faker->sentence(10),
        'long_description' => $faker->text,
        'price' => $faker->randomFloat(2, 5, 150),
        'code' => $faker->unique(true)->numberBetween(1, 50),
        'min_sale' => $faker->randomElement(['1', '6', '12']),
        'stock' => $faker->numberBetween(1, 1000),
        'category_id' => Category::all()->random()->id,
        'brand_id' => Brand::all()->random()->id,
        'packaging_id' => Packaging::all()->random()->id,
    ];
});
