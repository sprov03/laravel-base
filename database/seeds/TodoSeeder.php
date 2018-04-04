<?php

use App\User;
use Illuminate\Database\Seeder;
use Models\Todos\Todo;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var User $user */
        $user = User::first();

        $todo = factory(Todo::class, 5)->create([
        // 'id' => $faker->id,
        // 'label' => $faker->label,
        // 'notes' => $faker->notes,
        // 'deleted_at' => $faker->deleted_at,
        // 'created_at' => $faker->created_at,
        // 'updated_at' => $faker->updated_at,
         'user_id' => $user->id,
        ]);
    }
}
