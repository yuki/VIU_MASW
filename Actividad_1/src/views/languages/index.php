<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/LanguageController.php");
?>

<h1>Idiomas</h1>

<a class="btn btn-outline-primary" href="new.php" role="button">Nuevo Idioma</a>

<?php
  $languages = listLanguages();
  if (count($languages) > 0){
      include_once("_list.php");
  } else {
    echo "<p class='mt-3'>No hay idiomas. Vete y crea una en <a href='/views/languages/new.php'>este enlace</a>.</p>";
  }
  
  include_once("../template/html_tail.php");
?>