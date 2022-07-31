<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert(['name' => 'American English', 'rfc_code'=>'en-US']);
        DB::table('languages')->insert(['name' => 'Spanish', 'rfc_code'=>'es-ES']);
        DB::table('languages')->insert(['name' => 'Basque', 'rfc_code'=>'eu']);
    }
}
