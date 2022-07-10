<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/EpisodeController.php");


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


echo "<h1>".$episode->getName()."</h1>";

$celebrityFilmography = getEpisodeCasting($episode->getId());

echo "<h3 class='mt-5'>Casting del episodio</h3>";
echo "<p class=''><a href='/views/tvshows/show.php?id=".$episode->getTVShow()->getId()."'>".$episode->getTVShow()->getName().
        "</a> se emite en <a href='/views/platforms/show.php?id=".$episode->getTVShow()->getPlatform()->getId()."'>"
        .$episode->getTVShow()->getPlatform()->getName()."</a></p>";
if ($celebrityFilmography) {
    include_once("../celebrities/_episodes_celebrities.php");
} else {
    echo '<p>Este episodio no tiene casting asociado. <a href="/views/celebrities/">Vete y añade casting.</a></p>';
}
include_once("../template/html_tail.php");
?>