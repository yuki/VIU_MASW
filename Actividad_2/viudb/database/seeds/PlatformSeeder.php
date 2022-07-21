<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('platforms')->insert(['name' => 'Netflix']);
        DB::table('platforms')->insert(['name' => 'HBO']);
        DB::table('platforms')->insert(['name' => 'Amazon Prime Video']);
        DB::table('platforms')->insert(['name' => 'Showtime']);
    }
}
