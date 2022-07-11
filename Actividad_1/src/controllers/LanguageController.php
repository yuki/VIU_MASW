<?php

require_once(__DIR__."/DB.php");
require_once(__DIR__."/../models/Language.php");


// Devuelve la serie
function getLanguage($id) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);
    
    $data = execQuery("SELECT * FROM languages WHERE id = $id")->fetch_array();
    if ($data != NULL) {
        $language = new Language($data["id"],$data["name"],$data["rfc_code"]);
        return $language;
    }
    return NULL;
}


// Devuelve un array de todas las series
function listLanguages() {
    $languageList = execQuery("SELECT * FROM languages ORDER BY name ASC");

    $languages = [];
    foreach($languageList as $item){
        array_push($languages,new Language($item['id'],$item['name'],$item['rfc_code']));
    }
    
    return $languages;
}


// comprobamos que el nombre del idioma y su código existe
function checkLanguageName($name,$rfc_code) {
    return execQuery("SELECT * FROM languages WHERE lower(name) = '".strtolower($name)."' AND lower(rfc_code) = '".strtolower($rfc_code)."'");
}

// Creamos el idioma
function createLanguage($name,$rfc_code) {
    $languageCreated = false;
    $existe = checkLanguageName($name,$rfc_code);

    // comprobamos que no existe un idioma con el mismo nombre y código
    if (!$existe->num_rows){
        if (execQuery("INSERT INTO languages(name,rfc_code) VALUES ('$name','$rfc_code')")){
            $languageCreated = true;
        }
    }

    return $languageCreated;
}

// editamos el idioma
function editLanguage($id, $name,$rfc_code) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);

    $languageUpdated = false;
    // comprobamos si es igual que antes
    $old_lang = getLanguage($id);
    if ($old_lang->getName() == $name && $old_lang->getRFCCode() == $rfc_code) {
        // devolvemos true como si se hubiese actualizado.
        return true;
    }

    $existe = checkLanguageName($name,$rfc_code);
    if (!$existe->num_rows){
        if (execQuery("UPDATE languages SET name = '$name', rfc_code = '$rfc_code' WHERE id = $id")) {
            $languageUpdated = true;
        }
    }

    return $languageUpdated;
}

// Borra el idioma
function deleteLanguage($id) {
    if (!intval($id)){
        return NULL;
    }
    $id = intval($id);
    return execQuery("DELETE FROM languages WHERE id = $id");
}

?>