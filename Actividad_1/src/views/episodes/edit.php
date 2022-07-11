<?php
include_once("../template/html_head.php");
require_once("../../controllers/TVShowController.php");
require_once("../../controllers/EpisodeController.php");
require_once("../../controllers/helpers.php");
?>

<h1>Editar episodio</h1>

<?php
    $episode = getEpisode($_GET["id"]);
  /*
  * Parte POST, para comprobar si se crea la serie
  */
  if (isset($_POST["Button"])) {
    if (strlen($_POST["name"])>0 && $_POST["tvshow_id"]>0) {
      // tiene que haber nombre de serie y haber elegido plataforma.
      $episodeUpdated = editEpisode($_POST["id"],$_POST["name"],$_POST["released"],$_POST["tvshow_id"]);

      if ($episodeUpdated) {
        // episodio actualizado
        echo getAlert("episodio","editar","success","index.php");
      } else {
        // ha habido error
        echo getAlert("episodio","editar","danger","index.php");
      }
    } else {
      // No se ha introducido nombre de episodio 
      echo getAlert("episodio","falta","danger","index.php");
    }
  } else {
    $tvshowList = listTVShows();
    include("_form.php");
  }

include_once("../template/html_tail.php");
?>