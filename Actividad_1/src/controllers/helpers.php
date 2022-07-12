<?php
require_once(__DIR__."/../config.php");

/* ***********************************************************
 * 
 * Funciones que se pueden usar desde distintos sitios
 * ===========================================================
 * 
 * Funciones comunes a varios controladores. Así ahorramos 
 * código en vistas y/o controladores
 * 
 * ***********************************************************
 */

// Función que muestra una alerta dependiendo de cómo haya ido la acción
function getAlert($name, $action, $alertType, $link) {

    $message = '<div class="alert alert-'.$alertType.'" role="alert">';
    switch ($action) {
        case 'crear':
        case 'añadir':
        case 'editar':
            if ($action == 'crear') {
                $verbo = "creado";
            } elseif ($action == 'añadir') {
                $verbo = "añadido";
            } else {
                $verbo = "editado";
            }

            if ($alertType == "success") {
                $message .= 'La '.$name.' se ha '.$verbo;
            } else {
                $message .= '¡Ha habido un error al '.$action.' la '.$name.'!<br>';
                $message .= '<strong>¿Quizá la '.$name.' ya existe?</strong>';
            }
            break;
        case 'falta':
            $message .= 'Falta información en el formulario, u opciones no elegidas';
            break;
        case 'mostrar':
            $message .= '¡Ha habido un error al '.$action.' la '.$name.'!<br>';
            $message .= 'Quizá falta el parámetro o el episodio no existe';
            break;
    }
    if ($link){
        $message .= '<br><br><a href="'.$link.'" class="alert-link">Vete al listado de '.$name.'s.</a>';
    }
    $message .= '</div>';
    return $message;
}

// guardamos la imagen para una plataforma/serie/episodio/celebrity
function saveImage($file,$id,$what){
    if ($file["file"]["type"] == "image/jpeg" || $file["file"]["type"] == "image/jpg" || $file["file"]["type"] == "image/png") {
        global $conf;
        // me aseguro que el directorio existe
        if ( !is_dir( $conf["absolute_image_path"] ) ) {
            mkdir( $conf["absolute_image_path"] );       
        }
        $target_file = $conf["absolute_image_path"] . $what ."_".$id.".jpg";
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    }
}

// borramos la imagen de una plataforma/serie/episodio/celebrity
function deleteImage($id,$what){
    global $conf;
    $target_file = $conf["absolute_image_path"] . $what ."_".$id.".jpg";
    unlink($target_file);
}

// devuelve una ruta y si existe la imagen
function getImagePath($id,$what){
    global $conf;
    $absolute_target_file = $conf["absolute_image_path"] . $what ."_".$id.".jpg";
    $target_file = $conf["relative_image_path"] . $what ."_".$id.".jpg";
    return [file_exists($absolute_target_file),$target_file];
}


// cambiamos el formato de la fecha a dd/mm/yyyy
function changeDateFormat($old_date) {
    // devolvemos la fecha en formato dd/mm/yyyy
    $date = date_create($old_date);
    return date_format($date, 'd/m/Y');
}

// devuelve las posibles acciones de una celebrity
// TODO: ampliar a más funciones, pero hay que tocar el enum de MySQL
function getFunciones() {
    return ["director","actor"];
}

// devuelve los posibles tipos de idiomas para un episodio
function getLanguageTypes() {
    return ["audio","subtitle"];
}


// TODO: hacer función que compruebe que el ID es integer y si no de error
// ideal para poner en todas las funciones antes de buscar por ID.

?>