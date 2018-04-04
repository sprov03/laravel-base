<?php

use Illuminate\Database\Seeder;
use Models\Hero;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $heroes = factory(Hero::class, 5)->create([]);
    }
}
