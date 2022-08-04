<?php
use Illuminate\Support\Facades\Storage;

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
