<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Models\General\Form;

$factory->define(Form::class, function (Faker\Generator $faker) use ($factory) {

    return [
         'name' => $faker->name,
         'user_id' => function () {
             return factory(User::class)->create()->id;
         }
    ];
});