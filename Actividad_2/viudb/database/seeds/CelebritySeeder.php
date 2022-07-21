<?php

use Illuminate\Database\Seeder;

class CelebritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('celebrities')->insert(['name' => 'David', 'surname'=>'Swchwimmer','born'=>'1966-11-02','nation'=>'USA','url'=>'https://www.imdb.com/name/nm0001710']);
        DB::table('celebrities')->insert(['name' => 'Jennifer', 'surname'=>'Aniston','born'=>'1969-02-11','nation'=>'USA','url'=>'https://www.imdb.com/name/nm0000098/']);
        DB::table('celebrities')->insert(['name' => 'Lisa', 'surname'=>'Kudrow','born'=>'1963-07-30','nation'=>'USA','url'=>'https://www.imdb.com/name/nm0001435/']);
        DB::table('celebrities')->insert(['name' => 'Michael', 'surname'=>'C. Hall','born'=>'1971-02-01','nation'=>'USA','url'=>'https://www.imdb.com/name/nm0355910/']);
        DB::table('celebrities')->insert(['name' => 'Damian', 'surname'=>'Lewis','born'=>'1971-02-11','nation'=>'UK','url'=>'https://www.imdb.com/name/nm0507073/']);
        DB::table('celebrities')->insert(['name' => 'Courtney', 'surname'=>'Cox','born'=>'1964-06-15','nation'=>'USA','url'=>'https://www.imdb.com/name/nm0001073']);
    }
}
