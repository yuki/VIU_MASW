<?php
require_once(__DIR__."/../../controllers/CelebrityController.php");

// devuelve la filmografía
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // en principio sólo se llamará desde javascript
    echo  count(getFilmography($_GET["id"]));
}
?>