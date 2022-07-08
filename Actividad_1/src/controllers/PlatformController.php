<?php

require_once(__DIR__."/DB.php");
require_once(__DIR__."/../models/Platform.php");
require_once(__DIR__."/../models/TVShow.php");

// comprobamos que el nombre de la plataforma existe
function checkPlatformName($name) {
    // TODO: Esto quedaría mejor intentando hacer el insert, MySQL falla y recogiendo la
    // excepción. Lo dejo para más adelante.
    return execQuery("SELECT * FROM platforms WHERE lower(name) = '".strtolower($name)."'");
}

// Creamos la plataforma
function createPlatform($name) {
    $platformCreated = false;
    $existe = checkPlatformName($name);
    // comprobamos que no existe una plataforma con el mismo nombre
    if (!$existe->num_rows){
        if (execQuery("INSERT INTO platforms(name) VALUES ('$name')")){
            $platformCreated = true;
        }
    }

    return $platformCreated;
}

// Devolvemos la plataforma por su ID
function getPlatform($id) {
    $data = execQuery("SELECT * FROM platforms WHERE id = $id")->fetch_array();
    if ($data != NULL) {
        $platform = new Platform($data["id"],$data["name"]);
        return $platform;
    }
    return NULL;
}

// editamos el nombre de la plataforma
function editPlatform($id, $name) {
    $platformUpdated = false;
    // TODO: se podría mejorar esto. Se podría hacer a nivel de frontend con un input hidden,
    // pero aquí también hay que comprobarlo.

    // comprobamos si el nuevo nombre es el mismo que antes, y si lo es, no hacemos nada.
    $old_name = getPlatform($id)->getName();
    if ($old_name == $name) {
        // devolvemos true como si se hubiese actualizado.
        return true;
    }

    $existe = checkPlatformName($name);
    if (!$existe->num_rows){
        if (execQuery("UPDATE platforms SET name = '$name' WHERE id = $id")) {
            $platformUpdated = true;
        }
    }

    return $platformUpdated;
}

// Devuelve un array de todas las plataformas
function listPlatforms() {
    $platformList = execQuery("SELECT * FROM platforms");

    $platforms = [];
    foreach($platformList as $item){
        array_push($platforms,new Platform($item['id'],$item['name']));
    }
    
    return $platforms;
}

function deletePlatform($id) {
    return execQuery("DELETE FROM platforms WHERE id = $id");
}

// Devuelve las series que tiene la plataforma
function getPlatformShows($id) {
    $tvshows=[];
    // $platform = getPlatform($id);

    $list = execQuery("SELECT * FROM tvshows WHERE platform_id = $id");

    foreach ($list as $item) {
        array_push($tvshows,new TVShow($item["id"],$item["name"],$item["platform_id"],$item["url"]));
    }

    return $tvshows;
}

?>