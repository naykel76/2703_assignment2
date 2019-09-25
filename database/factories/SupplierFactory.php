<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplier;
use Faker\Generator as Faker;

$factory->define(Supplier::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 6, $max = 20), // seeded users
        'is_approved' => $faker->boolean($chanceOfGettingTrue = 70),
    ];
});
