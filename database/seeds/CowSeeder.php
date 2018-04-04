<?php

use Illuminate\Database\Seeder;
use Models\Users\Cows\Cow;

class CowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cows = factory(Cow::class, 20)->create([
        // 'id' => $faker->id,
        // 'name' => $faker->name,
        // 'deleted_at' => $faker->deleted_at,
        // 'created_at' => $faker->created_at,
        // 'updated_at' => $faker->updated_at,
        // 'user_id' => $faker->user_id,
        ]);
    }
}
