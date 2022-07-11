<?php
include_once("../template/html_head.php");
require_once(__DIR__."/../../controllers/PlatformController.php");
require_once(__DIR__."/../../controllers/helpers.php");
?>

<h1>Editar plataforma</h1>

<?php
  $platform = getPlatform($_GET["id"]);

  /*
  * Parte POST, para comprobar si se edita la plataforma
  */
  if (isset($_POST["Button"])) {
    if (strlen($_POST["name"])>0 && strlen($_POST["id"])>0) {
      $platformEdited = editPlatform($_POST["id"],$_POST["name"]);

      if ($platformEdited) {
        $platform->setName($_POST["name"]);
        // plataforma editada
        echo getAlert("plataforma","editar","success","index.php");
      } else {
        // ha habido error al crear la plataforma
        echo getAlert("plataforma","editar","danger","index.php");
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