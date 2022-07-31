<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TVShow extends Model
{
    use SoftDeletes;
    // cambiado, porque al crear el modelo como TVShow la tabla iba a ser t_v_shows
    protected $table = 'tvshows';

    // devuelve la plataforma a la que pertenece
    public function platform()
    {
        return $this->belongsTo('App\Platform');
    }
}
