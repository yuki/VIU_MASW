<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Language extends Model
{
    use SoftDeletes;

    // devuelve los episodios del idioma a través de la tabla episode_language
    // hay que indicar la columna extra que tiene la tabla.
    // es posible que no lo use, porque no sé si tiene sentido tener una vista para esto
    public function episodes() {
        return $this->belongsToMany('App\Episode')->withPivot([
            'type',
        ]);
    }
}
