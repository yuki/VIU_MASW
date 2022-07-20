<?php
use Illuminate\Support\Facades\Storage;


function saveImage($request,$id,$what){
    if ($request->validate(['file' => 'required|image|mimes:jpg,png,jpeg'])) {
        Storage::putFileAs('/public/img',$request->file,$what."_".$id.".jpg");
    }
}
