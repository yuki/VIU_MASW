<?php
/* ***********************************************************
 * 
 * Funciones que se pueden usar desde distintos sitios
 * ===========================================================
 * 
 * Funciones comunes
 * 
 * ***********************************************************
 */

function getAlert($name, $action, $alertType, $link) {

    $message = '<div class="alert alert-'.$alertType.'" role="alert">';
    switch ($action) {
        case 'crear':
            $message .= 'La '.$name.' se ha creado.<br>';
            $message .= '<a href="'.$link.'" class="alert-link">Vete al listado de '.$name.'s.</a>';
            break;
        
        case 'editar':
            $message .= 'La '.$name.' se ha editado.<br>';
            $message .= '<a href="'.$link.'" class="alert-link">Vete al listado de '.$name.'s.</a>';
            break;
        case 'error':
            $message .= '¡Ha habido un error al '.$action.' la '.$name.'!<br>';
            $message .= '<strong>¿Quizá la '.$name.' ya existe?</strong>';
            break;
        case 'falta':
            $message .= 'Falta información en el formulario';
            break;
    }

    $message .= '</div>';
    return $message;
}



?>