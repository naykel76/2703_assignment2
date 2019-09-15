<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {
    return [

        'user_id' => $faker->numberBetween($min = 0, $max = 20),
        'street_num' => $faker->numberBetween($min = 10, $max = 99999),
        'street' => $faker->streetName,
        'suburb' => $faker->state,
        'state' => $faker->state,
        'postcode' => $faker->state,

    ];
});
