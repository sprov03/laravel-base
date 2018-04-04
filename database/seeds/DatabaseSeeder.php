<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(FormSeeder::class);
        $this->call(HeroSeeder::class);
        $this->call(TodoSeeder::class);
        $this->call(CowSeeder::class);
        /** Seeder File Marker: Do Not Remove Being Used Buy Code Generator */
    }
}
