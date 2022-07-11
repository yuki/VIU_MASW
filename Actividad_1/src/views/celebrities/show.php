<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/CelebrityController.php");
require_once("../../controllers/TVShowController.php");
require_once("../../controllers/helpers.php");


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["funcion_id"]) && isset($_POST["episode_id"]) && isset($_POST["celebrity_id"]) ) {
    if ($_POST["funcion_id"]>0 && $_POST["episode_id"]>0 ) {
        $added = addFilmography($_POST["celebrity_id"],$_POST["funcion_id"],$_POST["episode_id"]);
        if ($added) {
            echo getAlert("filmography","añadir","success","");
        } else {
            echo getAlert("filmography","añadir","danger","");
        }
    } else {
       echo getAlert("filmography","falta","danger","");
    }
    
}


$error = false;
// si no hay ID ponemos error
if (!isset($_GET["id"])) {
    echo getAlert("celebrity","mostrar","danger","index.php");
    die;
}

$celebrity = getCelebrity($_GET["id"]);
// si no existe la plataforma ponemos error
if (!$celebrity) {
    echo getAlert("celebrity","mostrar","danger","index.php");
    die;
}


echo "<h1>".$celebrity->getName() ." ". $celebrity->getSurname()."</h1>";
// cogemos todas las series con sus capítulos
$allEpisodes = getAllTVShowsComplete();
$funciones = getFunciones();

include_once("../template/episodes_celebrities_modal.php");

?>
<a class="btn btn-outline-primary" role="button" 
    onclick="FilmographyModal()">Añadir filmografía</a>

<?php

$celebrityFilmography = getFilmography($_GET["id"]);

if ($celebrityFilmography) {
    include_once("_episodes_celebrities.php");
} else {
    echo '<p class="mt-5">Esta celebrity no tiene filmografía todavía.';
}

include_once("../template/html_tail.php");
?>