<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class celebrity_episodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('celebrity_episode')->insert(['celebrity_id' => 1, 'episode_id'=>2, 'perform_as'=>'actor']);
        DB::table('celebrity_episode')->insert(['celebrity_id' => 1, 'episode_id'=>3, 'perform_as'=>'actor']);
        DB::table('celebrity_episode')->insert(['celebrity_id' => 1, 'episode_id'=>4, 'perform_as'=>'actor']);
        DB::table('celebrity_episode')->insert(['celebrity_id' => 2, 'episode_id'=>1, 'perform_as'=>'actor']);
        DB::table('celebrity_episode')->insert(['celebrity_id' => 2, 'episode_id'=>2, 'perform_as'=>'actor']);
        DB::table('celebrity_episode')->insert(['celebrity_id' => 3, 'episode_id'=>1, 'perform_as'=>'actor']);
        DB::table('celebrity_episode')->insert(['celebrity_id' => 3, 'episode_id'=>2, 'perform_as'=>'actor']);
        DB::table('celebrity_episode')->insert(['celebrity_id' => 4, 'episode_id'=>5, 'perform_as'=>'actor']);
        DB::table('celebrity_episode')->insert(['celebrity_id' => 4, 'episode_id'=>6, 'perform_as'=>'actor']);
        DB::table('celebrity_episode')->insert(['celebrity_id' => 4, 'episode_id'=>7, 'perform_as'=>'actor']);
        DB::table('celebrity_episode')->insert(['celebrity_id' => 5, 'episode_id'=>3, 'perform_as'=>'actor']);
        DB::table('celebrity_episode')->insert(['celebrity_id' => 5, 'episode_id'=>4, 'perform_as'=>'actor']);
        DB::table('celebrity_episode')->insert(['celebrity_id' => 5, 'episode_id'=>8, 'perform_as'=>'actor']);
        DB::table('celebrity_episode')->insert(['celebrity_id' => 6, 'episode_id'=>1, 'perform_as'=>'actor']);
        DB::table('celebrity_episode')->insert(['celebrity_id' => 6, 'episode_id'=>2, 'perform_as'=>'actor']);
    }
}
