<?php
/* ***********************************************************
 * 
 * Fichero para la conexión a MySQL
 * ===========================================================
 * 
 * Así nos ahorramos tener que hacer las conexiones en otros 
 * sitios. Todo centralizado.
 * 
 * ***********************************************************
 */

require_once(__DIR__."/../config.php");


function connectDB() {
    global $conf;

    $mysqli = @new mysqli(
        $conf["db_host"],
        $conf["db_user"],
        $conf["db_pass"],
        $conf["db_name"]
    );

    if ($mysqli->connect_error) {
        die("Error: ".$mysqli->connect_error);
    }

    return $mysqli;
}

/*
 * Para no tener que estar instanciando la conexión en todos lados
 * me creo una función que recibe la query y devuelve el resultado.
*/
function execQuery($query){
    $mysqli = connectDB();
    try {
        $data = $mysqli->query(query: $query);
        $mysqli->close();
        return $data;
    } catch (\Throwable $th) {
        //throw $th;
        return NULL;
    }
    
}

?>