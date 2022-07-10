<?php
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
        case 'editar':
            if ($action == 'crear') {
                $verbo = "creado";
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
    }
    if ($link){
        $message .= '<br><br><a href="'.$link.'" class="alert-link">Vete al listado de '.$name.'s.</a>';
    }
    $message .= '</div>';
    return $message;
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


// TODO: hacer función que compruebe que el ID es integer y si no de error
// ideal para poner en todas las funciones antes de buscar por ID.

?>