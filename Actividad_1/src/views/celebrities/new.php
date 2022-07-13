<?php
include_once("../template/html_head.php");
require_once("../../controllers/CelebrityController.php");
require_once("../../controllers/helpers.php");
?>

<div class="col-md-7">
<h1>Añadir celebrity</h1>

<?php
  /*
  * Parte POST, para comprobar si se crea la celebrity
  */
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo checkCelebrityPost($_POST,$_FILES);
  } else {
    include("_form.php");
  }
?>
</div>

<?php include_once("../template/html_tail.php"); ?>