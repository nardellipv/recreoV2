<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Teacher;
use Faker\Generator as Faker;

$factory->define(Teacher::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'lastname' => $faker->lastName,
        'dni' => $faker->numberBetween($min = 10000000, $max = 99999999),
        'space' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'level' => $faker->randomElement(['1', '2']),
        'other_school' => $faker->randomElement(['SI', 'NO']),
        'name_school' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'phone' => $faker->e164PhoneNumber,
        'email' => $faker->unique()->safeEmail,
        'first_time' => $faker->randomElement(['SI', 'NO']),
        'user_id' => rand(1, 10),
    ];
});
