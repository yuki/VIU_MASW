<?php
include_once("../template/html_head.php");
require_once("../../controllers/LanguageController.php");
require_once("../../controllers/helpers.php");
?>
<div class="col-md-7">
<h1>Añadir idioma</h1>

<?php
  /*
  * Parte POST, para comprobar si se crea el idioma
  */
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo checkLanguagePost($_POST,$_FILES);
  } else {
    $languageList = listLanguages();
    include("_form.php");
  }

include_once("../template/html_tail.php");
?>
</div>