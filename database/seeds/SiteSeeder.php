<?php

use Illuminate\Database\Seeder;
use Models\Site;
use Models\User;

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
         'user_id' => User::first()->id,
        ]);
    }
}
