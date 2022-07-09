<?php
include_once("../template/html_head.php");
require_once("../../controllers/TVShowController.php");
require_once("../../controllers/EpisodeController.php");
require_once("../../controllers/helpers.php");
?>

<h1>Añadir episodio</h1>

<?php
  /*
  * Parte POST, para comprobar si se crea el capítulo
  */
  if (isset($_POST["Button"])) {
    
    if (strlen($_POST["name"])>0 && $_POST["tvshow_id"]>0) {
      // tiene que haber nombre del capítulo y haber elegido la serie.
      $episodeCreated = createEpisode($_POST["name"],$_POST["released"],$_POST["tvshow_id"]);

      if ($episodeCreated) {
        // capítulo creado
        echo getAlert("capítulo","crear","success","index.php");
      } else {
        // ha habido error al crear el capítulo
        echo getAlert("capítulo","crear","danger","index.php");
      }
    } else {
      // No se ha introducido nombre de capítulo
      echo getAlert("capítulo","falta","danger","index.php");
    }
  } else {
    $tvshowList = listTVShows();
    include("_form.php");
  }

include_once("../template/html_tail.php");
?>