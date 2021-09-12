<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'lastname'=>$faker->lastName,
        'dni'=>$faker->numberBetween($min = 10000000, $max = 99999999),
        'birth_date'=>$faker->date($format = 'Y-m-d'),
        'phone'=>$faker->e164PhoneNumber,
        'email'=>$faker->email,
        'classroom'=>rand(1,7),
        'level'=>$faker->randomElement(['1', '2']),
        'genre'=>$faker->randomElement(['FEMENINO', 'MASCULINO']),
       'first_note'=>$faker->numberBetween($min = 1, $max = 100),
       'second_note'=>$faker->numberBetween($min = 1, $max = 100),
       'total_note'=>$faker->numberBetween($min = 1, $max = 100),
        'first_time'=>$faker->randomElement(['SI', 'NO']),
        'user_id'=>rand(1,10),
    ];
});
