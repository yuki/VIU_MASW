<?php
include_once("../template/html_head.php");
require_once("../../controllers/TVShowController.php");
require_once("../../controllers/PlatformController.php");
require_once("../../controllers/helpers.php");
?>

<h1>Editar serie</h1>

<?php
    $tvshow = getTVShow($_GET["id"]);
  /*
  * Parte POST, para comprobar si se edita la serie
  */
  if (isset($_POST["Button"])) {
    if (strlen($_POST["name"])>0 && $_POST["platform_id"]>0) {
      // tiene que haber nombre de serie y haber elegido plataforma.
      $tvshowCreated = editTVShow($_POST["id"],$_POST["name"],$_POST["url"],$_POST["platform_id"],$_FILES);

      if ($tvshowCreated) {
        // serie creada
        echo getAlert("serie","editar","success","index.php");
      } else {
        // ha habido error al editar la serie
        echo getAlert("serie","editar","danger","index.php");
      }
    } else {
      // No se ha introducido nombre de serie o 
      echo getAlert("serie","falta","danger","index.php");
    }
  } else {
    $platformList = listPlatforms();
    include("_form.php");
  }

include_once("../template/html_tail.php");
?>