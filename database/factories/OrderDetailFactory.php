<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderDetail;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween($min = 10, $max = 20),
        'order_id' => $faker->numberBetween($min = 2, $max = 4),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 12) // 48.8932,
    ];
});
