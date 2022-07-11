<?php
include_once("../template/html_head.php");
require_once("../../controllers/LanguageController.php");
require_once("../../controllers/helpers.php");
?>

<h1>Añadir idioma</h1>

<?php
  /*
  * Parte POST, para comprobar si se crea el idioma
  */
  if (isset($_POST["Button"])) {
    // TODO: modificar
    if (strlen($_POST["name"])>0 && strlen($_POST["rfc_code"])>0) {
      // tiene que haber nombre del idioma y código rfc_code.
      $languageCreated = createLanguage($_POST["name"],$_POST["rfc_code"]);

      if ($languageCreated) {
        // idioma creado
        echo getAlert("idioma","crear","success","index.php");
      } else {
        // ha habido error al crear el idioma
        echo getAlert("idioma","crear","danger","index.php");
      }
    } else {
      // No se ha introducido nombre de idioma o RFC
      echo getAlert("idioma","falta","danger","index.php");
    }
  } else {
    $languageList = listLanguages();
    include("_form.php");
  }

include_once("../template/html_tail.php");
?>