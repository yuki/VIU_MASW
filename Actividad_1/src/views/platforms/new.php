<?php
include_once("../template/html_head.php");
require_once("../../controllers/PlatformController.php");
require_once("../../controllers/helpers.php");
?>

<div class="col-md-7">
<h1>Añadir plataforma</h1>

<?php
  // si es petición POST llamamos a función para ver si se crea la plataforma
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo checkPlatformPost($_POST,$_FILES);
  } else {
    include("_form.php");
  }

include_once("../template/html_tail.php");
?>

</div>