<?php
include_once("../template/html_head.php");
require_once("../../controllers/TVShowController.php");
require_once("../../controllers/PlatformController.php");
require_once("../../controllers/helpers.php");
?>

<h1>Añadir serie</h1>

<?php
  /*
  * Parte POST, para comprobar si se crea la serie
  */
  if (isset($_POST["Button"])) {
    if (strlen($_POST["name"])>0 && $_POST["platform_id"]>0) {
      // tiene que haber nombre de serie y haber elegido plataforma.
      $tvshowCreated = createTVShow($_POST["name"],$_POST["url"],$_POST["platform_id"]);

      if ($tvshowCreated) {
        // plataforma creada
        echo getAlert("serie","crear","success","index.php");
      } else {
        // ha habido error al crear la plataforma
        echo getAlert("serie","crear","danger","index.php");
      }
    } else {
      // No se ha introducido nombre de plataforma o 
      echo getAlert("serie","falta","danger","index.php");
    }
  } else {
    $platformList = listPlatforms();
    include("_form.php");
  }

include_once("../template/html_tail.php");
?>