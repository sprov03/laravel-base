<?php

use Illuminate\Database\Seeder;
use Models\Form;
use Models\FormField;
use Models\User;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::first();
        $form = factory(Form::class)->create(['user_id' => $user->id]);
        $form->formFields()->saveMany(factory(FormField::class, 10)->make(['form_id' => $form->id]));
    }
}
