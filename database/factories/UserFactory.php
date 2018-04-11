<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Client::class, function (Faker $faker) {
    return [
        "fname" => $faker->firstName,
        "lname" => $faker->lastName,
        "mname" => $faker->lastName,
        "plaintiff" => rand(1,3),
        "business_nature" => $faker->company,
        "email" => $faker->email,
        
    ];
});

$factory->define(App\ContactInfo::class, function ($faker) {

    return [
        "client_id" => factory('App\Client')->create()->id,
        'type' => 1,
        'description' => 'test'
    ];
});