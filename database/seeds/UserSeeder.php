<?php

use Illuminate\Database\Seeder;
use Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(\App\User::class)->create([
            'name' => 'Shawn Pivonka',
            'email' => 'sprov03@gmail.com',
            'password' => Hash::make('test808!')
        ]);

        factory(\App\User::class, 10)->create();
    }
}
