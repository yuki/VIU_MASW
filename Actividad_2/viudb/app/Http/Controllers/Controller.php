<?php

namespace App\Http\Controllers;

use App\Celebrity;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // borramos la filmografía/aparición de un actor en un episodio
    function deleteFilmography(Request $request){
        if ($request->has('celebrity_id') && $request->has('episode_id') && $request->has('funcion')) {
            $celebrity = Celebrity::find($request->celebrity_id);
            $celebrity->episodes()->where('episode_id','=',$request->episode_id)->wherePivot('perform_as',$request->funcion)->detach($request->episode_id);
            return 'OK';
        }
        return 'ERROR';
    }
}
