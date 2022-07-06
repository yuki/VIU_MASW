<?php

require_once("../config.php");


function connectDB() {
    $host = global $db_host;
    $user = global $db_user;
    $pass = global$db_password;
    $db   =  global $db_name;

    $mysqli = @new mysqli(
        $host,
        $user,
        $pass,
        $db
    );

    if ($mysqli->connect_error) {
        die("Error: ".$mysqli->connect_error);
    }

    return $mysqli;
}

?>