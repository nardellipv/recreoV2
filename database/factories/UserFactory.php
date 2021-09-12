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
        'name' => $faker->name,
        'address' => $faker->address,
        'postal_code' => $faker->randomNumber,
        'phone' => $faker->e164PhoneNumber,
        'type' => $faker->randomElement(['PRIVADA', 'PUBLICA']),
        'director1' => $faker->name,
        'director2' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'first_time' => $faker->randomElement(['SI', 'NO']),
        'sede' => $faker->randomElement(['SI', 'NO']),
        'province_id' => 2,
        'region_id' => 6,
        'email_verified_at' => now(),
        'password' => bcrypt('123'),
        'remember_token' => Str::random(10),
    ];
});
