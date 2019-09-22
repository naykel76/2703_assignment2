<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderDetail;
use Faker\Generator as Faker;

$factory->define(OrderDetail::class, function (Faker $faker) {
    return [
        'qty' => $faker->numberBetween($min = 1, $max = 12),
        'product_id' => $faker->numberBetween($min = 1, $max = 10),
        // 'order_id' => $faker->numberBetween($min = 1, $max = 20),
        'unit_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 12),
        'ext_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 24, $max = 120),
    ];
});
