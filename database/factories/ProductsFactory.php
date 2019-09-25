<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [

        'supplier_id' => $faker->numberBetween($min = 4, $max = 5),
        'name' => $faker->sentence,
        'price' => $faker->numberBetween($min = 0, $max = 20),
        'image' => $faker->image('public/storage/uploads/product_images', 400, 300, null, false)

    ];
});
