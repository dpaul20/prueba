<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=> $faker->word,
        'description'=> $faker->sentence(10),
        'long_descripction'=>$faker->text,
        'price'=>$faker->randomFloat(2, 5,150)
    ];
});
