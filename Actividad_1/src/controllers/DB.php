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

    try {
        $mysqli = connectDB();
    } catch (\Throwable $th) {
        //lanzamos error si entramos aquí
        die("
            <h1>Error fatal al conectar a la base de datos</h1>
            <div>Comprueba el fichero <strong>config.php</strong> y confirma que los datos son correctos.</div><br><br><br>
            <div>".$th."</div>
        ");
    }
    
    
    try {
        $data = $mysqli->query(query: $query);
        $mysqli->close();
        return $data;
    } catch (\Throwable $th) {
        return NULL;
        //para debug
        // die("
        //     <h1>Error fatal con la base de datos</h1>
        //     <div>Existe algún problema con la <strong>base de datos</strong> al realizar una sentencia.</div>
        //     <div>Hable con el administrador del servidor para que pueda comprobar qué es.</div><br><br><br>
        //     <div>".$th."</div>
        // ");
        
    }
}

?>