<?php
include_once("../template/html_head.php");
require_once("../../controllers/EpisodeController.php");
require_once("../../controllers/LanguageController.php");


if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    if (isset($_POST["addLanguage"])){
        if ($_POST["episode_id"]>0 && $_POST["language_id"]>0 && strlen($_POST["funcion"])>1 ) {

            $added = addEpisodeLanguage($_POST["episode_id"],$_POST["language_id"],$_POST["funcion"]);
            if ($added) {
                echo getAlert("idioma","añadir","success","");
            } else {
                echo getAlert("idioma","añadir","danger","");
            }
        } else {
        echo getAlert("idioma","falta","danger","");
        }
    } 
    
    
}


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
echo "<p class=''><a href='/views/tvshows/show.php?id=".$episode->getTVShow()->getId()."'>".$episode->getTVShow()->getName().
        "</a> se emite en <a href='/views/platforms/show.php?id=".$episode->getTVShow()->getPlatform()->getId()."'>"
        .$episode->getTVShow()->getPlatform()->getName()."</a></p>";

// cogemos el casting del episodio.
$celebrityFilmography = getEpisodeCasting($episode->getId());

echo "<h4 class='mt-5'>Casting del episodio</h4>";

if ($celebrityFilmography) {
    include_once("../celebrities/_episodes_celebrities.php");
} else {
    echo '<p>Este episodio no tiene casting asociado. <a href="/views/celebrities/">Vete y añade casting.</a></p>';
}

echo "<h4 class='mt-5'>Idiomas del episodio</h4>";

$episodeLanguages = getEpisodeLanguages($episode->getId());

$languages = listLanguages();
$tipos = getLanguageTypes();
if ($episodeLanguages) {
    include_once("_list_languages.php");
} else {
    echo '<p class="mt-3">Este episodio no tiene idiomas asociados. </p>';
}

?>
<a class="btn btn-outline-primary" role="button" onclick="languageModal()">Añadir Idiomas</a>

<?php

include_once("../template/language_modal.php");
include_once("../template/delete_modal.php");
include_once("../template/html_tail.php");
?>