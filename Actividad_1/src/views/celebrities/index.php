<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/CelebrityController.php");
?>

<div class="col-md-7">
<h1>Celebrities</h1>

<a class="btn btn-outline-primary" href="new.php" role="button">Nueva Celebrity</a>

<?php
  $celebritiesList = listCelebrities();
  if (count($celebritiesList) > 0){
      include_once("_list.php");
  } else {
        echo "<p class='mt-3'>No hay celebrities. Crea una a través del botón.</p>";      
  }
?>
</div>

<?php include_once("../template/html_tail.php"); ?>