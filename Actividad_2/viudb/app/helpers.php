<?php
use Illuminate\Support\Facades\Storage;


function saveImage($request,$id,$what){
    Storage::putFileAs('/public/img',$request->file,$what."_".$id.".jpg");
}
