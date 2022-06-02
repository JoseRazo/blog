<?php

use Faker\Generator as Faker;
use App\User;
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
    $array = [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('secret')

    ];
    return $array;
});
