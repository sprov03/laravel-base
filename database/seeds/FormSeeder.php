<?php

use App\User;
use Models\General\Form;
use Illuminate\Database\Seeder;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var User $user */
        $user = User::firstOrFail();
        $user->forms()->saveMany(factory(Form::class, 5)->make());

//        $form->formFields()->saveMany(factory(FormField::class, 10)->make(['form_id' => $form->id]));
    }
}
