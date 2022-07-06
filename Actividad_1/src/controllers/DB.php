<?php

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
    $data = $mysqli->query(query: $query);
    $mysqli->close();
    return $data;
}

?>