<?php
require_once(__DIR__."/../../controllers/TVShowController.php");

// devuelve los capítulos de una serie
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    // en principio sólo se llamará desde javascript
    echo  count(getTVShowEpisodes($_GET["id"]));
}
?>