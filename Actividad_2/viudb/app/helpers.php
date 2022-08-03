<?php
use Illuminate\Support\Facades\Storage;

// se encarga de guardar las imágenes
function saveImage($request,$id,$what){
    Storage::putFileAs('/public/img',$request->file,$what."_".$id.".jpg");
}


function celebrity_episode_performances() {
    return explode(',',env('CELEBRITY_EPISODE_FUNCTIONS'));
}
