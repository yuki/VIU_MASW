<?php
require_once(__DIR__."/../../controllers/PlatformController.php");

// FIXME: ¿Esto igual mejor como POST?
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // en principio sólo se llamará desde javascript
    echo  getPlatformShows($_GET["id"]) ;
}
?>