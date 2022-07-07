<?php
require_once(__DIR__."/../../controllers/PlatformController.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // en principio sólo se llamará desde javascript
    echo  deletePlatform($_GET["id"]) ;
}
?>