<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name_student' => $faker->firstName,
        'lastname_student' => $faker->lastName,
        'dni_student' => $faker->numberBetween($min = 10000000, $max = 99999999),
        'birth_date' => $faker->date($format = 'Y-m-d'),
        'phone_student' => $faker->e164PhoneNumber,
        'email_student' => $faker->email,
        'classroom' => $faker->randomElement(['PRIMARIA', 'SECUNDARIA']),
        'level_student' => $faker->randomElement(['1', '2']),
        'genre' => $faker->randomElement(['FEMENINO', 'MASCULINO']),
        'first_note' => $faker->numberBetween($min = 1, $max = 100),
        'second_note' => $faker->numberBetween($min = 1, $max = 100),
        'total_note' => $faker->numberBetween($min = 1, $max = 100),
        'first_note_inter' => $faker->numberBetween($min = 1, $max = 100),
        'second_note_inter' => $faker->numberBetween($min = 1, $max = 100),
        'total_note_inter' => $faker->numberBetween($min = 1, $max = 100),
        'first_time_student' => $faker->randomElement(['SI', 'NO']),
        'user_id' => rand(1, 10),
    ];
});
