<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 10, $max = 20),
        'supplier_id' => $faker->numberBetween($min = 2, $max = 4),
        'is_complete' => $faker->boolean($chanceOfGettingTrue = 80),
    ];
});
// dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null)
