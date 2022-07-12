<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/CelebrityController.php");
require_once("../../controllers/TVShowController.php");
require_once("../../controllers/helpers.php");

/*
* Recibimos el POST y añadimos
*/ 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["funcion"]) && isset($_POST["episode_id"]) && isset($_POST["celebrity_id"])) {
    if ($_POST["funcion"]>0 && $_POST["episode_id"]>0 ) {
        
        $added = addFilmography($_POST["celebrity_id"],$_POST["funcion"],$_POST["episode_id"]);
        if ($added) {
            echo getAlert("filmography","añadir","success","");
        } else {
            echo getAlert("filmography","añadir","danger","");
        }
    } else {
       echo getAlert("filmography","falta","danger","");
    }
    
}

/*
* GET
*/ 
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
?>

<div class="container">
  <div class="row">
    <div class="offset-md-1 col-auto">
        <?php

        $celebrityImage=getImagePath($celebrity->getId(),"celebrity");

        if ($celebrityImage[0]){
            echo "<img class='imagen_grande' src='$celebrityImage[1]'>";
        }
        ?>
    </div>
    <div class='col'>
        <h1><?php echo $celebrity->getName() ." ". $celebrity->getSurname() ?></h1>

        <?php
        // cogemos todas las series con sus capítulos
        $allEpisodes = getAllTVShowsComplete();
        $funciones = getFunciones();



        ?>
        <a class="btn btn-outline-primary mt-3" role="button" 
            onclick="FilmographyModal()">Añadir filmografía</a>

        <?php

        $celebrityFilmography = getFilmography($_GET["id"]);

        if ($celebrityFilmography) {
            include_once("_episodes_celebrities.php");
        } else {
            echo '<p class="mt-3">Esta celebrity no tiene filmografía todavía.';
        }

        include_once("../template/html_tail.php");
        ?>
celebrityImage

<?php
include_once("../template/episodes_celebrities_modal.php");
?>