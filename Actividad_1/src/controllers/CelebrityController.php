<?php

require_once(__DIR__."/DB.php");
require_once(__DIR__."/../models/Celebrity.php");


// devuelve un celebrity
function getCelebrity($id) {
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
function createCelebrity($name,$surname,$born,$nation,$url) {
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
        }
    }

    return $celebrityCreated;
}

// Editamos la celebrity
function editCelebrity($id, $name,$surname,$born,$nation,$url) {
    $celebrityUpdated = false;

    //generamos query de update
    $query = "UPDATE celebrities SET name = '$name',surname = '$surname', born = ";
    // por si  no se ha metido fecha.
    if (strlen($born) == 0) {
        $query .= "NULL";
    } else {
        $query .= "'$born'";
    }
    $query .= ",nation = '$nation', url = '$url' WHERE id = $id";

    $existe = checkCelebrityExists($name,$surname);
    // si existe, pero es el mismo id, e puede actulizar (por si se cambia fecha de nacimiento o así)
    if ($existe->fetch_array()["id"] == $id) {
        if (execQuery($query)){
            $celebrityUpdated = true;
        }
        return $celebrityUpdated;
    }
    // comprobamos que no existe una celebrity con el mismo nombre y apellidos y no sea el mismo
    if (!$existe->num_rows){
        
        if (execQuery($query)){
            $celebrityUpdated = true;
        }
    }

    return $celebrityUpdated;
}

// Borra la celebrity
function deleteCelebrity($id) {
    return execQuery("DELETE FROM celebrities WHERE id = $id");
}



// Devuelve la filmografía/apariciones de una celebrity
function getFilmography($id) {
    $tvshows=[];

    $list = execQuery("SELECT * FROM episodes_celebrities WHERE celebrity_id = $id");

    foreach ($list as $item) {
        array_push($tvshows,[$item["perform_as"],$item["episode_id"]]);
    }

    return $tvshows;
}


?>