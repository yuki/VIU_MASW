<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/EpisodeController.php");

$error = false;
// si no hay ID ponemos error
if (!isset($_GET["id"])) {
    $error = true;
    
}

$episode = getEpisode($_GET["id"]);
// si no existe la plataforma ponemos error
if (!$episode) {
    $error = true;
}
if ($error){
    echo "<h1>Esta celebrity no existe</h1>";
    echo "<p>Vete al listado de celebrities <a href='/views/celebrities'>aquí</a></p>";
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