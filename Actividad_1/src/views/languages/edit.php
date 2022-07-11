<?php
include_once("../template/html_head.php");
require_once("../../controllers/LanguageController.php");
require_once("../../controllers/helpers.php");
?>

<h1>Editar idioma</h1>

<?php
    $language = getLanguage($_GET["id"]);
  /*
  * Parte POST, para comprobar si se crea el  idioma
  */
  if (isset($_POST["Button"])) {
    if (strlen($_POST["name"])>0 && $_POST["id"]>0 && strlen($_POST["rfc_code"])>0) {
      // tiene que haber nombre de idioma 
      $episodeUpdated = editLanguage($_POST["id"],$_POST["name"],$_POST["rfc_code"]);

      if ($episodeUpdated) {
        // idioma actualizado
        echo getAlert("idioma","editar","success","index.php");
      } else {
        // ha habido error
        echo getAlert("idioma","editar","danger","index.php");
      }
    } else {
      // No se ha introducido nombre de idioma 
      echo getAlert("idioma","falta","danger","index.php");
    }
  } else {
    include_once("_form.php");
  }

include_once("../template/html_tail.php");
?>