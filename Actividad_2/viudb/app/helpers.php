<?php
use Illuminate\Support\Facades\Storage;
use App\Celebrity;
use App\Episode;
use App\Language;
use App\Platform;
use App\TVShow;

// se encarga de guardar las imágenes
function saveImage($request,$id,$what){
    Storage::putFileAs('/public/img',$request->file,$what."_".$id.".jpg");
}

// devuelve las funciones de un celebrity en un episodio
function celebrity_episode_performances() {
    return explode(',',env('CELEBRITY_EPISODE_FUNCTIONS'));
}

// devuelve los tipos de idioma para un episodio
function language_episode_types() {
    return explode(',',env('LANGUAGE_EPISODE_TYPES'));
}

/*
*
* FUNCIONES DE BÚSQUEDA
*
*/

// buscar celebrity
function search_celebrity($name) {
    return Celebrity::where('name','like','%'.$name.'%')
            ->orWhere('surname','like','%'.$name.'%')
            ->orWhere('born','like','%'.$name.'%')
            ->orderBy('name');
}

// buscar episodio
function search_episode($name) {
    return Episode::where('name','like','%'.$name.'%')
                    ->orWhere('sinopsis','like','%'.$name.'%')
                    ->orWhere('released','like','%'.$name.'%')
                    ->orderBy('name');
}

// buscar language
function search_language($name) {
    return Language::where('name','like','%'.$name.'%')->orderBy('name');
}

// buscar platform
function search_platform($name) {
    return Platform::where('name','like','%'.$name.'%')->orderBy('name');
}

// buscar tvshow
function search_tvshow($name) {
    return TVShow::where('name','like','%'.$name.'%')->orWhere('sinopsis','like','%'.$name.'%')->orderBy('name');
}


function searched($text,$search){
    return str_ireplace($search,'<span class="searched">'.$search.'</span>',$text);
}
