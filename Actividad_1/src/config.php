<?php

/* ***********************************************************
 * 
 * Fichero de configuración con distintas opciones necesarias.
 * ===========================================================
 * 
 * Generamos un array con distintas configuraciones para 
 * facilitar luego el uso de las variables.
 * 
 * ***********************************************************
 */

// Nombre de la aplicación
$conf["app_name"] = "ViuDB";

// Configuraciones de bases de datos
$conf["db_host"] = "mysql";      // IP/hostname del servidor. "mysql" sirve para Docker
$conf["db_port"] = 3306;         // Puerto de acceso a la base de datos
$conf["db_name"] = "actividad1"; // Nombre de la base de datos
$conf["db_user"] = "actividad1"; // Nombre del usuario para la conexión
$conf["db_pass"] = "4ct1v1d4d1"; // Password del usuario

// Path para las imágenes.
$conf["absolute_image_path"] = "/app/img/"; // respecto al servidor
$conf["relative_image_path"] = "/img/"; //respecto al directorio src

?>
