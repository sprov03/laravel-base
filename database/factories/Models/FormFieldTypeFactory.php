<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Models\FormFieldType::class, function (Faker\Generator $faker) use ($factory) {

    return [
         'name' => $faker->name,
    ];
});