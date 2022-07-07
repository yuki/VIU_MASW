<?php
require_once(__DIR__."/../../controllers/PlatformController.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // en principio sólo se llamará desde javascript
    echo deletePlatform($_POST["id"]) ;
}
?>