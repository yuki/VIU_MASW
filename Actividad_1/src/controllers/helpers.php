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
            $message .= 'Falta información en el formulario';
            break;
    }
    if ($link){
        $message .= '<br><br><a href="'.$link.'" class="alert-link">Vete al listado de '.$name.'s.</a>';
    }
    $message .= '</div>';
    return $message;
}



?>