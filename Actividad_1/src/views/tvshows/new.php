<?php
include_once("../template/html_head.php");
require_once("../../controllers/TVShowController.php");
require_once("../../controllers/PlatformController.php");
require_once("../../controllers/helpers.php");
?>

<div class="col-md-7">
<h1>Añadir serie</h1>

<?php
  /*
  * Parte POST, para comprobar si se crea la serie
  */
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo checkTVShowPost($_POST,$_FILES);
  } else {
    $platformList = listPlatforms();
    include("_form.php");
  }
?>

</div>

<?php include_once("../template/html_tail.php"); ?>