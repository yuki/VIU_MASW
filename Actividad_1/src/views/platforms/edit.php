<?php
include_once("../template/html_head.php");
require_once(__DIR__."/../../controllers/PlatformController.php");
require_once(__DIR__."/../../controllers/helpers.php");
?>

<div class="col-md-7">
<h1>Editar plataforma</h1>

<?php
  $platform = getPlatform($_GET["id"]);

  // si es petición POST llamamos a función para ver si se edita la plataforma
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo checkPlatformPost($_POST,$_FILES);
  } else {
    include("_form.php");
  }
?>
</div>

<?php include_once("../template/html_tail.php"); ?>