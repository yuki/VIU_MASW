<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/TVShowController.php");

// si no hay ID ponemos error
if (!isset($_GET["id"])) {
    echo "<h1>Esta serie no existe</h1>";
    echo "<p>Vete al listado de series <a href='/views/tvshows'>aquí</a></p>";
    die;
}


$tvshow = getTVShow($_GET["id"]);

if (!$tvshow) {
    echo "<h1>Esta serie no existe</h1>";
    die;
}

echo "<h1>".$tvshow->getName()."</h1>";

$episodeList = getTVShowEpisodes($tvshow->getId());

if ($episodeList) {
    include_once("../episodes/_list.php");
} else {
    echo '<p>Esta serie no tiene capítulos. <a href="/views/episodes/">Vete y crea uno.</a></p>';
}
include_once("../template/html_tail.php");
?>