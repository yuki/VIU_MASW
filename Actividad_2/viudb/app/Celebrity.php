<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Celebrity extends Model
{
    use SoftDeletes;

    // cambiamos el formato de la fecha
    public function fecha() {
        $date = date_create($this->born);
        return date_format($date, 'd/m/Y');
    }

    // devuelve los episodios en los que participa a través de la tabla celebrity_episode
    // hay que indicar la columna extra que tiene la tabla.
    public function episodes() {
        return $this->belongsToMany('App\Episode')->withPivot([
            'perform_as',
        ]);
    }
}
