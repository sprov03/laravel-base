<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site = factory(Site::class)->create([
        // 'id' => $faker->id,
        // 'domain' => $faker->domain,
        // 'user_id' => $faker->user_id,
        // 'created_at' => $faker->created_at,
        // 'updated_at' => $faker->updated_at,
        ]);
    }
}
