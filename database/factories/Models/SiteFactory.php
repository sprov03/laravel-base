<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Models\BuyingWebsite;
use Models\User;

$factory->define(Models\Site::class, function (Faker\Generator $faker) use ($factory) {

    return [
         'user_id' => factory(User::class)->create()->id,
         'website_id' => factory(BuyingWebsite::class)->create()->id,
         'website_type' => 'buying',
    ];
});