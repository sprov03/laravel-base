<?php

use Illuminate\Database\Seeder;
use Models\FormFieldType;

class FormFieldTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $formFieldType = factory(FormFieldType::class)->create([
        // 'name' => $faker->name,
        ]);
    }
}
