<?php

namespace App\Http\Controllers;

use App\Celebrity;
use App\Episode;
use App\Language;
use App\Platform;
use App\TVShow;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    function welcome(){
        $platforms = Platform::inRandomOrder()->limit(3)->get();
        $celebrities = Celebrity::inRandomOrder()->limit(3)->get();
        $tvshows = TVShow::inRandomOrder()->limit(3)->get();
        $episodes = Episode::inRandomOrder()->limit(3)->get();
        $languages = Language::inRandomOrder()->limit(3)->get();
        return view('welcome',[
                        'platforms' => $platforms,
                        'celebrities' => $celebrities,
                        'tvshows' => $tvshows,
                        'episodes' => $episodes,
                        'languages' => $languages,
        ]);
    }


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
