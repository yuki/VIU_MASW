<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/TVShowController.php");

$error = false;
// si no hay ID ponemos error
if (!isset($_GET["id"])) {
    $error = true;
}

$tvshow = getTVShow($_GET["id"]);
// por si el id es malo
if (!$tvshow) {
    $error = true;
}

if ($error){
    echo "<h1>Esta serie no existe</h1>";
    echo "<p>Vete al listado de series <a href='/views/tvshows'>aquí</a></p>";
    die;
}

echo "<h1>Episodios de ".$tvshow->getName()."</h1>";

$episodeList = getTVShowEpisodes($tvshow->getId());

if ($episodeList) {
    include_once("../episodes/_list.php");
} else {
    echo '<p>Esta serie no tiene capítulos. <a href="/views/episodes/new.php?tvshow_id='.$tvshow->getId().'">Vete y crea uno.</a></p>';
}
include_once("../template/html_tail.php");
?>