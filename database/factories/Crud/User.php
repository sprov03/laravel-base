<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Crud\User::class, function (Faker\Generator $faker) use ($factory) {

    return [
        // 'id' => $faker->id,
        // 'name' => $faker->name,
        // 'email' => $faker->email,
        // 'password' => $faker->password,
        // 'remember_token' => $faker->remember_token,
        // 'created_at' => $faker->created_at,
        // 'updated_at' => $faker->updated_at,
    ];
});