<?php
include_once("../template/html_head.php");
require_once("../../controllers/LanguageController.php");
require_once("../../controllers/helpers.php");
?>

<div class="col-md-7">
<h1>Editar idioma</h1>

<?php
    $language = getLanguage($_GET["id"]);
  /*
  * Parte POST, para comprobar si se edita el  idioma
  */
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo checkLanguagePost($_POST,$_FILES);
  } else {
    include_once("_form.php");
  }

include_once("../template/html_tail.php");
?>
</div>