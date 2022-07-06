<?php

require_once(__DIR__."/DB.php");
require_once(__DIR__."/../models/Platform.php");


function checkPlatformName($name) {
    // TODO: Esto quedaría mejor intentando hacer el insert, MySQL falla y recogiendo la
    // excepción. Lo dejo para más adelante.
    return execQuery("SELECT * FROM platform WHERE lower(name) = '".strtolower($name)."'");
}


function createPlatform($name) {
    $platformCreated = false;
    $existe = checkPlatformName($name);
    // comprobamos que no existe una plataforma con el mismo nombre
    if (!$existe->num_rows){
        if (execQuery("INSERT INTO platform(name) VALUES ('$name')")){
            $platformCreated = true;
        }
    }

    return $platformCreated;
}

function getPlatform($id) {
    $data = execQuery("SELECT * FROM platform WHERE id = $id")->fetch_array();
    $platform = new Platform($data["id"],$data["name"]);

    return $platform;
}

function editPlatform($id, $name) {
    $platformUpdated = false;
    $existe = checkPlatformName($name);
    if (!$existe->num_rows){
        if (execQuery("UPDATE platform SET name = '$name' WHERE id = $id")) {
            $platformUpdated = true;
        }
    }

    return $platformUpdated;
}

function listPlatforms() {
    $platformList = execQuery("SELECT * FROM platform");

    $platforms = [];
    foreach($platformList as $item){
        array_push($platforms,new Platform($item['id'],$item['name']));
    }
    
    return $platforms;
}

?>