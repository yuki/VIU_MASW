<?php

require_once("DB.php");
require_once("../models/Platform.php");

function listPlatform() {
    $mysqli = connectDB();
    $platformList = $mysqli->query(query: "SELECT * FROM platforms");

    $platforms = [];
    foreach($platformList as $item){
        array_push($platforms,new Platform($item['id'],$item['name']));
    }
}

?>