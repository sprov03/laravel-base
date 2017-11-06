<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Models\User::class, function (Faker\Generator $faker) use ($factory) {

    return [
         'name' => $faker->name,
         'email' => $faker->email,
         'password' => $faker->password,
         'remember_token' => $faker->randomNumber(),
    ];
});