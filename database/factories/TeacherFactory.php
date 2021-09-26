<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Teacher;
use Faker\Generator as Faker;

$factory->define(Teacher::class, function (Faker $faker) {
    return [
        'name_teacher' => $faker->firstName,
        'lastname_teacher' => $faker->lastName,
        'dni_teacher' => $faker->numberBetween($min = 10000000, $max = 99999999),
        'space' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'level_teacher' => $faker->randomElement(['1', '2']),
        'other_school' => $faker->randomElement(['SI', 'NO']),
        'name_school_teacher' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'phone_teacher' => $faker->e164PhoneNumber,
        'email_teacher' => $faker->unique()->safeEmail,
        'first_time_teacher' => $faker->randomElement(['SI', 'NO']),
        'user_id' => rand(1, 10),
    ];
});
