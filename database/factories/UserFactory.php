<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;

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

$factory->define(App\Admin::class, function (Faker $faker) {
  return [
    'first_name' => $faker->firstNameMale,
    'last_name' => $faker->lastName,
    'email' => $faker->unique()->safeEmail,
    'services' => json_encode(['Alaska', 'Texas']),
    'telephone_number' => $faker->tollFreePhoneNumber,
    'image' => null,
    'email_verified_at' => now(),
    'password' => bcrypt('64526452'),
  ];
});

$factory->define(App\Client::class, function (Faker $faker) {
  return [
    'first_name' => $faker->firstNameMale,
    'last_name' => $faker->lastName,
    'email' => $faker->unique()->safeEmail,
    'telephone_number' => $faker->tollFreePhoneNumber,
    'status' => $faker->randomElement(['active', 'inActive', 'suspended'])
  ];
});