<?php
include_once("../template/html_head.php");
require_once("../../controllers/CelebrityController.php");
require_once("../../controllers/helpers.php");
?>

<div class="col-md-7">
<h1>Editar plataforma</h1>

<?php
  $celebrity = getCelebrity($_GET["id"]);

  /*
  * Parte POST, para comprobar si se crea la plataforma
  */
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo checkCelebrityPost($_POST,$_FILES);
  } else {
    include("_form.php");
  }
?>
</div>

<?php include_once("../template/html_tail.php"); ?>