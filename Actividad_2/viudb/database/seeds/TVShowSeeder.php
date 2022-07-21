<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TVShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tvshows')->insert([
            'name' => 'Stranger Things',
            'sinopsis' => 'Cuando un chico desaparece, su madre, el jefe de policía y sus amigos deben enfrentarse a fuerzas terroríficas para traerlo de vuelta.',
            'url' => 'https://www.imdb.com/title/tt0773262',
            'platform_id' => 1,
        ]);
        DB::table('tvshows')->insert([
            'name' => 'The Boys',
            'sinopsis' => 'Cuando un chico desaparece, su madre, el jefe de policía y sus amigos deben enfrentarse a fuerzas terroríficas para traerlo de vuelta.',
            'url' => 'https://www.imdb.com/title/tt1190634',
            'platform_id' => 3,
        ]);
        DB::table('tvshows')->insert([
            'name' => 'Hermanos de sangre',
            'sinopsis' => 'La historia de la Easy Company de la División Aerotransportada 101 del Ejército de los Estados Unidos y su misión en la Segunda Guerra Mundial en Europa, desde la Operación Overlord hasta el Día V-J.',
            'url' => 'https://www.imdb.com/title/tt0185906/',
            'platform_id' => 2,
        ]);
        DB::table('tvshows')->insert([
            'name' => 'Friends',
            'sinopsis' => 'La vida personal y profesional de seis amigos, de veinte a treinta y tantos años, que viven en Manhattan.',
            'url' => 'https://www.imdb.com/title/tt0108778',
            'platform_id' => 1,
        ]);
        DB::table('tvshows')->insert([
            'name' => 'Dexter',
            'sinopsis' => 'Durante el día, Dexter es un analista para la policía de Miami. Pero por la noche, es un asesino en serie que solo ataca a otros asesinos.',
            'url' => 'https://www.imdb.com/title/tt0773262',
            'platform_id' => 4,
        ]);
        DB::table('tvshows')->insert([
            'name' => 'A dos metros bajo tierra',
            'sinopsis' => 'Una comedia negra que sigue la vida de una disfuncional familia californiana que se dedica a llevar unas pompas fúnebres.',
            'url' => 'https://www.imdb.com/title/tt0248654/',
            'platform_id' => 2,
        ]);
        DB::table('tvshows')->insert([
            'name' => 'Homeland',
            'sinopsis' => 'Un agente bipolar de la CIA se convence de que al-Qaeda ha convertido a un prisionero de guerra y planea llevar a cabo un ataque terrorista en suelo estadounidense.',
            'url' => 'https://www.imdb.com/title/tt1796960',
            'platform_id' => 4,
        ]);
    }
}
