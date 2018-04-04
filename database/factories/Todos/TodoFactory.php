<?php

use App\User;
use Models\Todos\Todo;
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Todo::class, function (Faker\Generator $faker) use ($factory) {

    return [
        // 'id' => $faker->id,
         'label' => $faker->name,
         'notes' => $faker->paragraph,
        'user_id' => function () {
            return factory(User::class)->create()->id;
        }
        // 'deleted_at' => $faker->deleted_at,
        // 'created_at' => $faker->created_at,
        // 'updated_at' => $faker->updated_at,
    ];
});