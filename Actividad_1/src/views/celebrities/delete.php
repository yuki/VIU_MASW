<?php
require_once(__DIR__."/../../controllers/CelebrityController.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // en principio sólo se llamará desde javascript
    echo deleteCelebrity($_POST["id"]) ;
}
?>