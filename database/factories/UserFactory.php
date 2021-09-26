<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name_school' => $faker->name,
        'address' => $faker->address,
        'postal_code' => $faker->randomNumber,
        'phone_school' => $faker->e164PhoneNumber,
        'type' => $faker->randomElement(['PRIVADA', 'PUBLICA']),
        'director1' => $faker->name,
        'director2' => $faker->name,
        'email_school' => $faker->unique()->safeEmail,
        'first_time_school' => $faker->randomElement(['SI', 'NO']),
        'sede' => $faker->randomElement(['SI', 'NO']),
        'userType' => 'Colegio',
        'province_id' => $faker->randomElement([2, 6, 10, 14, 22, 26, 18, 30, 34, 38, 42, 46, 50, 54, 58, 62, 66, 70, 74, 78, 82, 86, 90, 94]),
        'region_id' => 6,
        'email_verified_at' => now(),
        'password' => bcrypt('123'),
        'remember_token' => Str::random(10),
    ];
});
