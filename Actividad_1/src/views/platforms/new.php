<?php
include_once("../template/html_head.php");
require_once("../../controllers/PlatformController.php");
require_once("../../controllers/helpers.php");
?>

<h1>Añadir plataforma</h1>

<?php
  /*
  * Parte POST, para comprobar si se crea la plataforma
  */
  if (isset($_POST["Button"])) {
    if (strlen($_POST["name"])>0) {
      $platformCreated = createPlatform($_POST["name"]);

      if ($platformCreated) {
        // plataforma creada
        echo getAlert("plataforma","crear","success","index.php");
      } else {
        // ha habido error al crear la plataforma
        echo getAlert("plataforma","crear","danger","index.php");
      }
    } else {
      // No se ha introducido nombre de plataforma
      echo getAlert("plataforma","falta","danger","index.php");
    }
  } else {
    include("_form.php");
  }

include_once("../template/html_tail.php");
?>