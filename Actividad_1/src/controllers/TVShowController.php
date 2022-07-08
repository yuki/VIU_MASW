<?php

require_once(__DIR__."/DB.php");
require_once(__DIR__."/../models/TVShow.php");


// Devuelve un array de todas las plataformas
function listTVShows() {
    $tvshowList = execQuery("SELECT * FROM tvshows");

    $tvshows = [];
    foreach($tvshowList as $item){
        array_push($tvshows,new TVShow($item['id'],$item['name'],$item['platform_id'],$item['url']));
    }
    
    return $tvshows;
}

function checkTVShowName($name) {
    // TODO: Esto quedaría mejor intentando hacer el insert, MySQL falla y recogiendo la
    // excepción. Lo dejo para más adelante.
    return execQuery("SELECT * FROM tvshows WHERE lower(name) = '".strtolower($name)."'");
}

function createTVShow($name,$url,$platform_id) {

    $tvshowCreated = false;
    //comprobamos que la plataforma existe
    $platformExists = getPlatform($platform_id);
    $tvshowExists = checkTVShowName($name);
    // comprobamos que no existe una serie con el mismo nombre
    if (!$tvshowExists->num_rows && $platformExists){
        if (execQuery("INSERT INTO tvshows(name,url,platform_id) VALUES ('$name','$url',$platform_id)")){
            $tvshowCreated = true;
        }
    }

    return $tvshowCreated;
}

?>