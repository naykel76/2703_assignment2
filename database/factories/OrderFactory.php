<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {

    return [

        'user_id' => $faker->numberBetween($min = 2, $max = 3), // seeded users
        'supplier_id' => $faker->numberBetween($min = 1, $max = 5), // seeded suppliers
        'is_complete' => $faker->boolean($chanceOfGettingTrue = 80),
        'payment_id' => random_int(100, 99999999),
        'created_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null)

    ];
});
