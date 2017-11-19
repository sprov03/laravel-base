<?php

use Illuminate\Database\Seeder;
use Models\BuyingWebsite;

class BuyingWebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buyingWebsite = factory(BuyingWebsite::class)->create([
        // 'id' => $faker->id,
        ]);
    }
}
