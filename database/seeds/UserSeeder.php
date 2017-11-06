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
        $user = factory(User::class)->create([
            'name' => 'Shawn Pivonka',
        ]);
    }
}
