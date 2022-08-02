<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Episode extends Model
{
    use SoftDeletes;

    // devuelve la serie a la que pertenece
    public function tvshow()
    {
        return $this->belongsTo('App\TVShow');
    }

    // devuelve las celebrities que tiene el capítulo a través de la tabla celebrity_episode
    // hay que indicar la columna extra que tiene la tabla.
    public function celebrities() {
        return $this->belongsToMany('App\Celebrity')->withPivot([
            'perform_as',
        ]);
    }

    // devuelve los languages que tiene el capítulo a través de la tabla episode_language
    // hay que indicar la columna extra que tiene la tabla.
    public function languages() {
        return $this->belongsToMany('App\Language')->withPivot([
            'type',
        ]);
    }
}
