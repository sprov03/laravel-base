<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Models\User;

$factory->define(Models\Form::class, function (Faker\Generator $faker) use ($factory) {

    return [
         'user_id' => factory(User::class)->create()->id,
    ];
});