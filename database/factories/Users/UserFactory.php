<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Users\User::class, function (Faker\Generator $faker) use ($factory) {

    return [
        // 'id' => $faker->id,
        // 'name' => $faker->name,
        // 'email' => $faker->email,
        // 'password' => $faker->password,
        // 'remember_token' => $faker->remember_token,
        // 'deleted_at' => $faker->deleted_at,
    ];
});