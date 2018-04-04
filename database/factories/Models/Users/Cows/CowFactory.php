<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Models\Users\Cows\Cow::class, function (Faker\Generator $faker) use ($factory) {

    return [
        // 'id' => $faker->id,
        // 'name' => $faker->name,
        // 'deleted_at' => $faker->deleted_at,
        // 'created_at' => $faker->created_at,
        // 'updated_at' => $faker->updated_at,
        // 'user_id' => $faker->user_id,
    ];
});