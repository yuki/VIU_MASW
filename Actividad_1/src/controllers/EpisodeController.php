<?php

require_once(__DIR__."/DB.php");
require_once(__DIR__."/../models/Episode.php");
require_once(__DIR__."/../models/Language.php");
require_once(__DIR__."/../controllers/CelebrityController.php");


// comprueba el parámetro POST para ver si se puede crear o editar el episodio
function checkEpisodePost($post,$file) {

    if ( (isset($post["Crear"]) && isset($post["name"]) && $post["tvshow_id"]) && 
            (((strlen($post["name"])>0 && strlen($post["name"])<50) && $post["tvshow_id"]>0)) && strlen($post["sinopsis"])<512 )
    {
        // tiene que haber nombre del capítulo y haber elegido la serie.
        $episodeCreated = createEpisode($post["name"],$post["season"],$post["episode"],$post["sinopsis"],$post["released"],$post["tvshow_id"]);

        if ($episodeCreated) {
             // guardamos la imagen
            if (isset($file)){
                $episodeExists = checkEpisodeName($post["name"],$post["tvshow_id"]);
                saveImage($file,$episodeExists->fetch_array()["id"],"episode");
            }
            // capítulo creado
            return getAlert("el episodio","crear","success","index.php");
        } else {
            // ha habido error al crear el capítulo
            return getAlert("el episodio","crear","danger","index.php");
        }
    } else if ((isset($post["Editar"]) && isset($post["name"]) && isset($post["id"]) && isset($post["tvshow_id"])) && 
                (((strlen($post["name"])>0 && strlen($post["name"])<50) && $post["tvshow_id"]>0)) && strlen($post["sinopsis"])<512 )
    {
        $episodeUpdated = editEpisode($post["id"],$post["name"],$post["season"],$post["episode"],$post["sinopsis"],$post["released"],$post["tvshow_id"]);

        if ($episodeUpdated) {
            // episodio actualizado
            return getAlert("el episodio","editar","success","index.php");
        } else {
            // ha habido error
            return getAlert("el episodio","editar","danger","index.php");
        }
    }
    return getAlert("el episodio","falta","danger","index.php");
}


// devuelve el episodio
function getEpisode($id) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);

    $data = execQuery("SELECT * FROM episodes WHERE id = $id")->fetch_array();
    if ($data != NULL) {
        $episode = new Episode($data["id"],$data["name"],$data["season"],$data["episode"],$data["sinopsis"],$data["tvshow_id"],$data["released"]);
        return $episode;
    }
    return NULL;
}

// Devuelve un array de todos los episodios
function listEpisodes() {
    $episodeList = execQuery("SELECT * FROM episodes ORDER BY name ASC");

    $episodes = [];
    foreach($episodeList as $item){
        array_push($episodes,new Episode($item['id'],$item['name'],$item["season"],$item["episode"],$item["sinopsis"],$item['tvshow_id'],$item['released']));
    }
    
    return $episodes;
}

// comprobamos que no exista un capítulo con el mismo episodio para la misma serie
function checkEpisodeName($name,$tvhsow_id) {
    return execQuery("SELECT * FROM episodes WHERE lower(name) = '".strtolower($name)."' AND tvshow_id = ".$tvhsow_id);
}

// Creamos el capítulo
function createEpisode($name,$season,$episode_num,$sinopsis,$released,$tvshow_id) {
    $episodeCreated = false;

    //comprobamos que la serie existe
    $tvshowExists = getTVShow($tvshow_id);
    $episodeExists = checkEpisodeName($name,$tvshow_id);
    // comprobamos que no existe otro capítulo para la serie que se llame igual
    if (!$episodeExists->num_rows && $tvshowExists){
        $query = "INSERT INTO episodes(name,season,episode,sinopsis,released,tvshow_id)
                    VALUES ('$name',".intval($season).",".intval($episode_num).",'$sinopsis',";
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


// Editamos el episodio
function editEpisode($id,$name,$season,$episode_num,$sinopsis,$released,$tvshow_id) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);

    $episodeUpdated = false;

    //generamos query de actualización
    $query = "UPDATE episodes SET name = '$name', season = ".intval($season).",episode=".intval($episode_num).", sinopsis = '$sinopsis', tvshow_id = $tvshow_id";
    // por si  no se ha metido fecha.
    if (strlen($released) != 0) {
        $query .= ", released = '$released'";
    }
    $query .= " WHERE id = $id";

    // comprobamos si el nuevo nombre es el mismo que antes, y de la misma serie. 
    // si lo es, no comprobamos si ya existe.
    $old = getEpisode($id);
    if ($old->getName() == $name && $old->getTVShow()->getId() == $tvshow_id) {
        if (execQuery($query)){
            $episodeUpdated = true;
        }
        return $episodeUpdated;
    }

    //comprobamos que la serie existe
    $tvshowExists = getTVShow($tvshow_id);
    $episodeExists = checkEpisodeName($name,$tvshow_id);
    // comprobamos que no existe otro capítulo para la serie que se llame igual
    // y que no sea el mismo ID, y que la serie exista para evitar hacks
    if (!$episodeExists->num_rows && $tvshowExists){
        if (execQuery($query)){
            $episodeUpdated = true;
        }
    }

    return $episodeUpdated;
}

// Borra el episodio
function deleteEpisode($id) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);

    return execQuery("DELETE FROM episodes WHERE id = $id");
}

// Devuelve el casting de celebrities que participa en el capítulo
function getEpisodeCasting($id) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);
    
    $celebrities=[];

    $list = execQuery("SELECT * FROM episodes_celebrities WHERE episode_id = $id");

    foreach ($list as $item) {
        array_push($celebrities,[getCelebrity($item["celebrity_id"]),$item["perform_as"]]);
    }

    return $celebrities;
}

// Devuelve los idiomas que tiene un episodio
function getEpisodeLanguages($id) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);
    
    $languages=[];

    $list = execQuery("SELECT * FROM episodes_languages WHERE episode_id = $id");
    foreach ($list as $item) {
        array_push($languages,[getLanguage($item["language_id"]),$item["type"]]);
    }

    return $languages;
}

// añadimos idioma al episodio
function addEpisodeLanguage($episode_id,$language_id,$type){
    $added = false;

    if (!intval($episode_id)){
        return NULL;
    }
    $episode_id = intval($episode_id);

    if (!intval($language_id)){
        return NULL;
    }
    $language_id = intval($language_id);

    $episode = getEpisode($episode_id);
    $language = getLanguage($language_id);

    if ($episode && $language) {
        if (execQuery("INSERT INTO episodes_languages(episode_id,language_id,type) VALUES ($episode_id,$language_id,'$type')")){
            $added = true;
        }
    }
    return $added;
}

// borramos el idioma al episodio
function deleteEpisodeLanguage($episode_id,$language_id,$type){
    return execQuery("DELETE FROM episodes_languages WHERE episode_id = $episode_id AND language_id = $language_id AND type = '$type'");
}

?>