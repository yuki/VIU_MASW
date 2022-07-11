<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/TVShowController.php");
require_once("../../controllers/PlatformController.php");
?>

<h1>Series</h1>

<a class="btn btn-outline-primary" href="new.php" role="button">Nueva Serie</a>

<?php
  $tvshowList = listTVShows();
  if (count($tvshowList) > 0){
      include_once("_list.php");
  } else {
      $platformList = listPlatforms();
      if (count($platformList) > 0){
        echo "<p class='mt-3'>No hay series. Crea una a través del botón.</p>";
      } else {
        echo "<p class='mt-3'>No hay Plataformas. Vete y crea una en <a href='/views/platforms/new.php'>este enlace</a>.</p>";
      }
      
  }
  
  include_once("../template/html_tail.php");
?>