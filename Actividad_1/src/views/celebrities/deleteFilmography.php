<?php
require_once(__DIR__."/../../controllers/CelebrityController.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"]) && isset($_POST["episode_id"]) && isset($_POST["funcion"])) {
    // en principio sólo se llamará desde javascript
    echo deleteFilmography($_POST["id"],$_POST["funcion"],$_POST["episode_id"]) ;
}
?>