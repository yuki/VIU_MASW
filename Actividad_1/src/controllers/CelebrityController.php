<?php

require_once(__DIR__."/DB.php");
require_once(__DIR__."/helpers.php");
require_once(__DIR__."/../models/Celebrity.php");
require_once(__DIR__."/../controllers/EpisodeController.php");


// devuelve un celebrity
function getCelebrity($id) {
    if (!intval($id)){
         return NULL;
    }
    $id = intval($id);
    $data = execQuery("SELECT * FROM celebrities WHERE id = $id")->fetch_array();
    if ($data != NULL) {
        $celebrity = new Celebrity($data["id"],$data["name"],$data["surname"],$data["born"],$data["nation"],$data["url"]);
        return $celebrity;
    }
    return NULL;
}

// Devuelve un array de todos los celebrities
function listCelebrities() {
    $celebritiesList = execQuery("SELECT * FROM celebrities ORDER BY name ASC");

    $celebrities = [];
    foreach($celebritiesList as $item){
        array_push($celebrities,new Celebrity($item["id"],$item["name"],$item["surname"],$item["born"],$item["nation"],$item["url"]));
    }
    
    return $celebrities;
}

// comprobamos que no exista otra celebrity con el mismo nombre y apellidos
function checkCelebrityExists($name,$surname){
    // TODO: cambiar y meter la fecha de nacimiento?
    return execQuery("SELECT * FROM celebrities WHERE lower(name) = '".strtolower($name)."' AND lower(surname) = '".strtolower($surname)."'");
}

// Creamos la celebrity
function createCelebrity($name,$surname,$born,$nation,$url,$file) {
    $celebrityCreated = false;
    $existe = checkCelebrityExists($name,$surname);
    // comprobamos que no existe una plataforma con el mismo nombre
    if (!$existe->num_rows){
        $query = "INSERT INTO celebrities(name,surname,born,nation,url) VALUES  ('$name','$surname',";
        // por si  no se ha metido fecha.
        if (strlen($born) == 0) {
            $query .= "NULL";
        } else {
            $query .= "'$born'";
        }
        $query .= ",'$nation','$url')";
        if (execQuery($query)){
            $celebrityCreated = true;
            // guardamos la imagen
            if (isset($file)){
                $celebrityExists = checkCelebrityExists($name,$surname);
                saveImage($file,$celebrityExists->fetch_array()["id"],"celebrity");
            }
        }
    }

    return $celebrityCreated;
}

// Editamos la celebrity
function editCelebrity($id, $name,$surname,$born,$nation,$url,$file) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);
    $celebrityUpdated = false;

    //generamos query de update
    $query = "UPDATE celebrities SET name = '$name',surname = '$surname', born = ";
    // por si  no se ha metido fecha.
    if (strlen($born) == 0) {
        $query .= "NULL";
    } else {
        $query .= "'$born'";
    }
    $query .= ",nation = '$nation', url = '$url' WHERE id = ".intval($id);

    $existe = checkCelebrityExists($name,$surname);
    // si existe, pero es el mismo id, e puede actulizar (por si se cambia fecha de nacimiento o así)
    if ($existe->fetch_array()["id"] == intval($id)) {
        if (execQuery($query)){
            $celebrityUpdated = true;
            // guardamos la imagen
            if (isset($file)){
                saveImage($file,$id,"celebrity");
            }
        }
        return $celebrityUpdated;
    }
    // comprobamos que no existe una celebrity con el mismo nombre y apellidos y no sea el mismo
    if (!$existe->num_rows){
        
        if (execQuery($query)){
            $celebrityUpdated = true;
            // guardamos la imagen
            if (isset($file)){
                saveImage($file,$id,"celebrity");
            }
        }
    }

    return $celebrityUpdated;
}

// Borra la celebrity
function deleteCelebrity($id) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);
    return execQuery("DELETE FROM celebrities WHERE id = $id");
}



// Devuelve la filmografía/apariciones de una celebrity
function getFilmography($id) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);
    $tvshows=[];

    $list = execQuery("SELECT * FROM episodes_celebrities WHERE celebrity_id = $id");

    foreach ($list as $item) {
        array_push($tvshows,[getEpisode($item["episode_id"]),$item["perform_as"]]);
    }

    return $tvshows;
}


// añadimos filmografía a celebrity
function addFilmography($id,$funcion,$episode_id) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);
    $celebrity = getCelebrity($id);
    if ($celebrity) {
        $episode = getEpisode($episode_id);
        if ($episode) {
            return execQuery("INSERT INTO episodes_celebrities(celebrity_id,episode_id,perform_as) VALUES ($id,$episode_id,'$funcion')");
        }
    }
    return NULL;
}

// borramos la filmografía al celebrity
function deleteFilmography($id,$funcion,$episode_id) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);
    $celebrity = getCelebrity($id);
    if ($celebrity) {
        $episode = getEpisode($episode_id);
        if ($episode) {
            return execQuery("DELETE FROM episodes_celebrities WHERE 
                                celebrity_id = $id AND 
                                episode_id = $episode_id AND 
                                perform_as = '$funcion'");
        }
    }
    return NULL;
}

?>