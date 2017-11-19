<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Models\Form;
use Models\FormFieldType;

$factory->define(Models\FormField::class, function (Faker\Generator $faker) use ($factory) {

    return [
         'form_id' => factory(Form::class)->create()->id,
         'form_field_type' => factory(FormFieldType::class)->create()->name,
    ];
});