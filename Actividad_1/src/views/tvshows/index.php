<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/TVShowController.php");
?>

<h1>Series</h1>

<a class="btn btn-outline-primary" href="new.php" role="button">Nueva Serie</a>

<?php
  $tvshowList = listTVShows();
  if (count($tvshowList) > 0){
      include_once("_list.php");
  } else {
      echo "<p>No hay series. Crea una a través del botón.</p>";
  }
  
  include_once("../template/html_tail.php");
?>