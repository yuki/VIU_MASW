<?php

require_once(__DIR__."/DB.php");
require_once(__DIR__."/helpers.php");
require_once(__DIR__."/../models/TVShow.php");
require_once(__DIR__."/../models/Episode.php");
require_once(__DIR__."/CelebrityController.php");


// comprueba el parámetro POST para ver si se puede crear o editar la plataforma
function checkTVShowPost($post,$file) {

    if ( (isset($post["Crear"]) && isset($post["name"]) && $post["platform_id"]) && 
            (((strlen($post["name"])>0 && strlen($post["name"])<50) && $post["platform_id"]>0)) && strlen($post["sinopsis"])<512 )
    {
        // vamos a crear y el parámetro "name" existe y el platform_id
        $tvshowCreated = createTVShow($post["name"],$post["sinopsis"],$post["url"],$post["platform_id"]);

        if ($tvshowCreated) {
            // plataforma creada y guardamos la imagen
            if (isset($file)){
                $tvshowExists = checkTVShowName($post["name"]);
                saveImage($file,$tvshowExists->fetch_array()["id"],"tvshow");
            }
            return getAlert("la serie","crear","success","index.php");
        } else {
            // ha habido error al crear la serie
            return getAlert("la serie","crear","danger","index.php");
        }
    } else if ((isset($post["Editar"]) && isset($post["name"]) && isset($post["id"]) && isset($post["platform_id"])) && 
                (((strlen($post["name"])>0 && strlen($post["name"])<50) && $post["platform_id"]>0)) && strlen($post["sinopsis"])<512)
    {
        // tiene que haber nombre de serie y haber elegido plataforma.
        $tvshowCreated = editTVShow($post["id"],$post["name"],$post["sinopsis"],$post["url"],$post["platform_id"]);
        if ($tvshowCreated) {
             // plataforma creada y guardamos la imagen
             if (isset($file)){
                saveImage($file,$post["id"],"tvshow");
            }
            // serie creada
            return getAlert("la serie","editar","success","index.php");
        } else {
            // ha habido error al editar la serie
            return getAlert("la serie","editar","danger","index.php");
        }
    }
    return getAlert("la serie","falta","danger","index.php");
}

// Devuelve la serie
function getTVShow($id) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);
    
    $data = execQuery("SELECT * FROM tvshows WHERE id = $id")->fetch_array();
    if ($data != NULL) {
        $platform = new TVShow($data["id"],$data["name"],$data["sinopsis"],$data["platform_id"],$data["url"]);
        return $platform;
    }
    return NULL;
}


// Devuelve un array de todas las series
function listTVShows() {
    $tvshowList = execQuery("SELECT * FROM tvshows ORDER BY name ASC");

    $tvshows = [];
    foreach($tvshowList as $item){
        array_push($tvshows,new TVShow($item['id'],$item['name'],$item["sinopsis"],$item['platform_id'],$item['url']));
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
function createTVShow($name,$sinopsis,$url,$platform_id) {
    $tvshowCreated = false;

    //comprobamos que la plataforma existe
    $platformExists = getPlatform($platform_id);
    $tvshowExists = checkTVShowName($name);
    // comprobamos que no existe una serie con el mismo nombre
    if (!$tvshowExists->num_rows && $platformExists){
        if (execQuery("INSERT INTO tvshows(name,sinopsis,url,platform_id) VALUES ('$name','$sinopsis','$url',$platform_id)")){
            $tvshowCreated = true;
        }
    }

    return $tvshowCreated;
}

// Editamos la serie
function editTVShow($id,$name,$sinopsis,$url,$platform_id) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);

    $tvshowUpdated = false;

    // generamos query:
    $query = "UPDATE tvshows SET name = '$name', sinopsis='$sinopsis', url = '$url', platform_id = '$platform_id' WHERE id = $id";

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
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);
    deleteImage($id,"tvshow");
    return execQuery("DELETE FROM tvshows WHERE id = $id");
}


// Devuelve los capítulos que tiene una serie
function getTVShowEpisodes($id) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);

    $episodes=[];

    $list = execQuery("SELECT * FROM episodes WHERE tvshow_id = $id");

    foreach ($list as $item) {
        array_push($episodes,new Episode($item["id"],$item["name"],$item["season"],$item["episode"],$item["sinopsis"],$item["tvshow_id"],$item["released"]));
    }

    return $episodes;
}

// devolvemos todas las series y sus capítulos con el id del capítulo para la parte de añadir filmografía
function getAllTVShowsComplete() {
    $episodes=[];

    $list = execQuery("SELECT CONCAT(tvshows.name, ' - ' , episodes.name) AS name, episodes.id 
                FROM tvshows, episodes WHERE tvshows.id = episodes.tvshow_id ORDER BY name");

    foreach ($list as $item) {
        array_push($episodes,[$item["id"],$item["name"]]);
    }

    return $episodes;
}


function getTVShowCasting($id) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);
    
    $celebrities=[];

    $list = execQuery("SELECT DISTINCT(celebrity_id) 
                        FROM episodes_celebrities 
                        WHERE episode_id IN (SELECT id FROM episodes WHERE tvshow_id = $id)
                        LIMIT 5");

    foreach ($list as $item) {
        array_push($celebrities,getCelebrity($item["celebrity_id"]));
    }

    return $celebrities;
}


?>