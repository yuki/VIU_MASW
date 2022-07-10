<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/EpisodeController.php");

$error = false;
// si no hay ID ponemos error
if (!isset($_GET["id"])) {
    echo getAlert("episodio","mostrar","danger","index.php");
    die;
}

$episode = getEpisode($_GET["id"]);
// si no existe el episodio ponemos error
if (!$episode) {
    echo getAlert("episodio","mostrar","danger","index.php");
    die;
}


// TODO:continuar con el show
echo "TODO: hay que terminar esto";

// echo "<h1>".$platform->getName()."</h1>";

// $tvshowList = getPlatformShows($platform->getId());

// if ($tvshowList) {
//     include_once("../tvshows/_list.php");
// } else {
//     echo '<p>Esta plataforma no tiene series. <a href="/views/tvshows/">Vete y crea una.</a></p>';
// }
include_once("../template/html_tail.php");
?>