<?php
include_once("../template/html_head.php");
require_once("../../controllers/TVShowController.php");
require_once("../../controllers/PlatformController.php");
require_once("../../controllers/helpers.php");
?>
<div class="col-md-7">
<h1>Editar serie</h1>

<?php
    $tvshow = getTVShow($_GET["id"]);
  /*
  * Parte POST, para comprobar si se edita la serie
  */
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo checkTVShowPost($_POST,$_FILES);
  } else {
    $platformList = listPlatforms();
    include("_form.php");
  }

include_once("../template/html_tail.php");
?>
</div>