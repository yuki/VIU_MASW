<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('episodes')->insert([
            'name' => 'Sin proposiciones',
            'sinopsis' => 'Rachel, Ross and Joey get together in a guyand figure out that no one was actually going to propose; Mr. Geller walks in on Monica and Chandler having sex.',
            'season' => 9,
            'episode' => 9,
            'released' => '2002-09-26',
            'tvshow_id' => 4,
        ]);
        DB::table('episodes')->insert([
            'name' => 'El de las Vegas',
            'sinopsis' => 'Chandler and Monica reconcile and hastily decide to get married. Ross and Rachel get drunk and roam the casino. Phoebe deals with a lurkeon the slot machines.',
            'season' => 5,
            'episode' => 24,
            'released' => '1999-05-20',
            'tvshow_id' => 4,
        ]);
        DB::table('episodes')->insert([
            'name' => 'Currahee',
            'sinopsis' => 'Easy Company goes through training under the leadership of a captain who relentlessly pushes them to their limits but may be limited as a leader in the field.',
            'season' => 1,
            'episode' => 1,
            'released' => '2001-09-09',
            'tvshow_id' => 3,
        ]);
        DB::table('episodes')->insert([
            'name' => 'Puntos',
            'sinopsis' => 'Los soldados reciben los puntos obtenidos durante la guerra.',
            'season' => 1,
            'episode' => 10,
            'released' => null,
            'tvshow_id' => 3,
        ]);
        DB::table('episodes')->insert([
            'name' => 'Dexter',
            'sinopsis' => 'Dexter\'s world is rocked when a rival serial murderer, dubbed the Ice Truck Killer by the media, privately contacts him and reveals that he knows Dexter\'s grisly secret. Meanwhile, Dexter\'s sister Debra is transferred to Homicide.',
            'season' => 1,
            'episode' => 1,
            'released' => '2006-10-01',
            'tvshow_id' => 5,
        ]);
        DB::table('episodes')->insert([
            'name' => 'Cocodrilo',
            'sinopsis' => 'Dexter\'s world is rocked when a rival serial murderer, dubbed the Ice Truck Killer by the media, privately contacts him and reveals that he knows Dexter\'s grisly secret. Meanwhile, Dexter\'s sister Debra is transferred to Homicide.',
            'season' => 1,
            'episode' => 2,
            'released' => null,
            'tvshow_id' => 5,
        ]);
        DB::table('episodes')->insert([
            'name' => 'Piloto',
            'sinopsis' => 'When the funeral director is killed in an accident, the family comes together to mourn and decide the fate of the funeral home.',
            'season' => 1,
            'episode' => 1,
            'released' => '2001-06-03',
            'tvshow_id' => 6,
        ]);
        DB::table('episodes')->insert([
            'name' => 'Piloto',
            'sinopsis' => 'A CIA case officer becomes suspicious that a Marine Sergeant war hero rescued after eight years of captivity in Afghanistan, has been turned into a sleeper agent by Al Qaeda.',
            'season' => 1,
            'episode' => 1,
            'released' => '2012-04-09',
            'tvshow_id' => 7,
        ]);
    }
}
