<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Episode_LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('episode_language')->insert(['episode_id' => 1, 'language_id'=>2, 'type'=>'audio']);
        DB::table('episode_language')->insert(['episode_id' => 1, 'language_id'=>1, 'type'=>'audio']);
        DB::table('episode_language')->insert(['episode_id' => 1, 'language_id'=>1, 'type'=>'subtitle']);
        DB::table('episode_language')->insert(['episode_id' => 2, 'language_id'=>1, 'type'=>'audio']);
        DB::table('episode_language')->insert(['episode_id' => 2, 'language_id'=>1, 'type'=>'subtitle']);
        DB::table('episode_language')->insert(['episode_id' => 3, 'language_id'=>1, 'type'=>'audio']);
        DB::table('episode_language')->insert(['episode_id' => 4, 'language_id'=>1, 'type'=>'audio']);
        DB::table('episode_language')->insert(['episode_id' => 4, 'language_id'=>3, 'type'=>'audio']);
        DB::table('episode_language')->insert(['episode_id' => 5, 'language_id'=>2, 'type'=>'audio']);
        DB::table('episode_language')->insert(['episode_id' => 5, 'language_id'=>1, 'type'=>'audio']);
        DB::table('episode_language')->insert(['episode_id' => 5, 'language_id'=>1, 'type'=>'subtitle']);
        DB::table('episode_language')->insert(['episode_id' => 6, 'language_id'=>1, 'type'=>'audio']);
        DB::table('episode_language')->insert(['episode_id' => 6, 'language_id'=>1, 'type'=>'subtitle']);
        DB::table('episode_language')->insert(['episode_id' => 7, 'language_id'=>1, 'type'=>'audio']);
        DB::table('episode_language')->insert(['episode_id' => 7, 'language_id'=>1, 'type'=>'subtitle ']);
        DB::table('episode_language')->insert(['episode_id' => 8, 'language_id'=>3, 'type'=>'audio']);

    }
}
