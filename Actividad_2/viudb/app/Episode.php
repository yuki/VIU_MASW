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
}
