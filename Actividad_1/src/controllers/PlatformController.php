<?php

require_once(__DIR__."/DB.php");
require_once(__DIR__."/../models/Platform.php");
require_once(__DIR__."/../models/TVShow.php");
require_once(__DIR__."/helpers.php");

// comprueba el parámetro POST para ver si se puede crear o editar la plataforma
function checkPlatformPost($post,$file) {
    if ((isset($post["Crear"]) && isset($post["name"])) && (strlen($post["name"])>0 && strlen($post["name"])<50)){
        // vamos a crear y el parámetro "name" es correcto
        $platformCreated = createPlatform($post["name"]);

        if ($platformCreated) {
            // plataforma creada y guardamos la imagen
            if (isset($file)){

                $platformExists = checkPlatformName($post["name"]);
                saveImage($file,$platformExists->fetch_array()["id"],"platform");
            }
            return getAlert("la plataforma","crear","success","index.php");
        } else {
            // ha habido error al crear la plataforma
            return getAlert("la plataforma","crear","danger","index.php");
        }
    } else if ((isset($post["Editar"]) && isset($post["name"]) && isset($post["id"])) && (strlen($post["name"])>0 && strlen($post["id"])>0)) {
        // vamos a editar y los parámetros "name"  e "id" son correctos
        $platformEdited = editPlatform($post["id"],$post["name"]);
    
        if ($platformEdited) {
            // plataforma editada
            // plataforma creada y guardamos la imagen
            if (isset($file)){
                $platformExists = checkPlatformName($post["name"]);
                saveImage($file,$platformExists->fetch_array()["id"],"platform");
            }
            return getAlert("la plataforma","editar","success","index.php");
        } else {
            // ha habido error al crear la plataforma
            return getAlert("la plataforma","editar","danger","index.php");
        }
    }
    return getAlert("la plataforma","falta","danger","index.php");

}

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
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);
    $data = execQuery("SELECT * FROM platforms WHERE id = $id")->fetch_array();
    if ($data != NULL) {
        $platform = new Platform($data["id"],$data["name"]);
        return $platform;
    }
    return NULL;
}

// editamos el nombre de la plataforma
function editPlatform($id, $name) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);

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
    $platformList = execQuery("SELECT * FROM platforms ORDER BY name ASC");

    $platforms = [];
    foreach($platformList as $item){
        array_push($platforms,new Platform($item['id'],$item['name']));
    }
    
    return $platforms;
}

// Borra la plataforma
function deletePlatform($id) {
    deleteImage($id,"platform");
    return execQuery("DELETE FROM platforms WHERE id = $id");
}

// Devuelve las series que tiene la plataforma
function getPlatformShows($id) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);
    
    $tvshows=[];
    // $platform = getPlatform($id);

    $list = execQuery("SELECT * FROM tvshows WHERE platform_id = $id");

    foreach ($list as $item) {
        array_push($tvshows,new TVShow($item["id"],$item["name"],$item["sinopsis"],$item["platform_id"],$item["url"]));
    }

    return $tvshows;
}

?>