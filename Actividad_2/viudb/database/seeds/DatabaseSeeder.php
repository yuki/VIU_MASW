<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PlatformSeeder::class);
        $this->call(CelebritySeeder::class);
        $this->call(TVShowSeeder::class);
        $this->call(LanguageSeeder::class);
    }
}
