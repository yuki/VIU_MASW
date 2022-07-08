<?php

require_once(__DIR__."/DB.php");
require_once(__DIR__."/../models/Episode.php");


// devuelve el episodio
function getEpisode($id) {
    $data = execQuery("SELECT * FROM episodes WHERE id = $id")->fetch_array();
    if ($data != NULL) {
        $episode = new Episode($data["id"],$data["name"],$data["tvshow_id"],$data["released"]);
        return $episode;
    }
    return NULL;
}

// Devuelve un array de todos los episodios
function listEpisodes() {
    $episodeList = execQuery("SELECT * FROM episodes ORDER BY name ASC");

    $episodes = [];
    foreach($episodeList as $item){
        array_push($episodes,new Episode($item['id'],$item['name'],$item['tvshow_id'],$item['released']));
    }
    
    return $episodes;
}

// comprobamos que no exista un capítulo con el mismo episodio para la misma serie
function checkEpisodeName($name,$tvhsow_id) {
    return execQuery("SELECT * FROM episodes WHERE lower(name) = '".strtolower($name)."' AND tvshow_id = ".$tvhsow_id);
}

// Creamos el capítulo
function createEpisode($name,$released,$tvshow_id) {
    $episodeCreated = false;

    //comprobamos que la serie existe
    $tvshowExists = getTVShow($tvshow_id);
    $episodeExists = checkEpisodeName($name,$tvshow_id);
    // comprobamos que no existe otro capítulo para la serie que se llame igual
    if (!$episodeExists->num_rows && $tvshowExists){
        $query = "INSERT INTO episodes(name,released,tvshow_id) VALUES ('$name',";
        // por si  no se ha metido fecha.
        if (strlen($released) == 0) {
            $query .= "NULL";
        } else {
            $query .= "'$released'";
        }
        $query .= ",$tvshow_id)";
        if (execQuery($query)){
            $episodeCreated = true;
        }
    }

    return $episodeCreated;
}


?>