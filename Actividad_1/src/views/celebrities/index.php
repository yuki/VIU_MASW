<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/CelebrityController.php");
?>

<h1>Celebrities</h1>

<a class="btn btn-outline-primary" href="new.php" role="button">Nuevo Celebrity</a>

<?php
  $celebritiesList = listCelebrities();
  if (count($celebritiesList) > 0){
      include_once("_list.php");
  } else {
        echo "<p>No hay celebrities. Crea una a través del botón.</p>";      
  }
  
  include_once("../template/html_tail.php");
?>