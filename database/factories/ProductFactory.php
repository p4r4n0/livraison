<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'description' => $faker->text(250),
        'categorie' => $faker->text(10),
        'image' => $faker->imageUrl(),
        'created_at' => now(),
        'updated_at' => now(),

    ];
});
