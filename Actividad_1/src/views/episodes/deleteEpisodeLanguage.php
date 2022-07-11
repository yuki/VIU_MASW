<?php
require_once(__DIR__."/../../controllers/EpisodeController.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["episode_id"]) && isset($_POST["language_id"]) && isset($_POST["type"])) {
    // en principio sólo se llamará desde javascript
    echo deleteEpisodeLanguage($_POST["episode_id"],$_POST["language_id"],$_POST["type"]) ;
}
?>