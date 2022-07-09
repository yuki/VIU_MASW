<?php
include_once("../template/html_head.php");
require_once("../../controllers/CelebrityController.php");
require_once("../../controllers/helpers.php");
?>

<h1>Editar plataforma</h1>

<?php
  $celebrity = getCelebrity($_GET["id"]);

  /*
  * Parte POST, para comprobar si se crea la plataforma
  */
  if (isset($_POST["Button"])) {
    if (strlen($_POST["name"])>0 && strlen($_POST["surname"])>0 && strlen($_POST["id"])>0) {
      $celebrityEdited = editCelebrity($_POST["id"],$_POST["name"],$_POST["surname"],$_POST["born"],$_POST["nation"],$_POST["url"]);

      if ($celebrityEdited) {
        $celebrity->setName($_POST["name"]);
        // plataforma editada
        echo getAlert("celebrity","editar","success","index.php");
      } else {
        // ha habido error al crear la plataforma
        echo getAlert("celebrity","editar","danger","index.php");
      }
    } else {
      // No se ha introducido nombre de plataforma
      echo getAlert("celebrity","falta","danger","index.php");
    }
  } else {
    include("_form.php");
  }

  include_once("../template/html_tail.php");
?>