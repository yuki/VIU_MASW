<?php

require_once(__DIR__."/DB.php");
require_once(__DIR__."/../models/TVShow.php");
require_once(__DIR__."/../models/Episode.php");


// Devuelve la serie
function getTVShow($id) {
    $data = execQuery("SELECT * FROM tvshows WHERE id = $id")->fetch_array();
    if ($data != NULL) {
        $platform = new TVShow($data["id"],$data["name"],$data["platform_id"],$data["url"]);
        return $platform;
    }
    return NULL;
}


// Devuelve un array de todas las series
function listTVShows() {
    $tvshowList = execQuery("SELECT * FROM tvshows ORDER BY name ASC");

    $tvshows = [];
    foreach($tvshowList as $item){
        array_push($tvshows,new TVShow($item['id'],$item['name'],$item['platform_id'],$item['url']));
    }
    
    return $tvshows;
}

// comprobamos que no exista otro show igual
function checkTVShowName($name) {
    // TODO: Esto quedaría mejor intentando hacer el insert, MySQL falla y recogiendo la
    // excepción. Lo dejo para más adelante.
    return execQuery("SELECT * FROM tvshows WHERE lower(name) = '".strtolower($name)."'");
}

// Creamos la serie
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

// Editamos la serie
function editTVShow($id,$name,$url,$platform_id) {
    $tvshowUpdated = false;

    // generamos query:
    $query = "UPDATE tvshows SET name = '$name', url = '$url', platform_id = '$platform_id' WHERE id = $id";

    // comprobamos si el nuevo nombre es el mismo que antes, y si lo es, no comprobamos si ya existe.
    $old_name = getTVShow($id)->getName();
    if ($old_name == $name) {
        if (execQuery($query)) {
            $tvshowUpdated = true;
        }
        return $tvshowUpdated;
    }

    $platformExists = getPlatform($platform_id);
    $tvshowExists = checkTVShowName($name);
    if (!$tvshowExists->num_rows && $platformExists){
        
        if (execQuery($query)) {
            $tvshowUpdated = true;
        }
    }

    return $tvshowUpdated;
}

// Borra la serie
function deleteTVShow($id) {
    return execQuery("DELETE FROM tvshows WHERE id = $id");
}


// Devuelve los capítulos que tiene una serie
function getTVShowEpisodes($id) {
    $episodes=[];

    $list = execQuery("SELECT * FROM episodes WHERE tvshow_id = $id");

    foreach ($list as $item) {
        array_push($episodes,new Episode($item["id"],$item["name"],$item["tvshow_id"],$item["released"]));
    }

    return $episodes;
}

?>