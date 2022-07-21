<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Platform extends Model
{
    use SoftDeletes;

    // devuelve las series de una plataforma
    public function tvshows()
    {
        return $this->hasMany('App\TVShow');
    }
}
