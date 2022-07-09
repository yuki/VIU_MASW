<?php
require_once(__DIR__."/../../controllers/EpisodeController.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // en principio sólo se llamará desde javascript
    echo deleteEpisode($_POST["id"]) ;
}
?>