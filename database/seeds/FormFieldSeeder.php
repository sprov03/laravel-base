<?php

use Illuminate\Database\Seeder;
use Models\FormField;

class FormFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formField = factory(FormField::class)->create([
        // 'id' => $faker->id,
        // 'form_id' => $faker->form_id,
        // 'form_field_type' => $faker->form_field_type,
        ]);
    }
}
