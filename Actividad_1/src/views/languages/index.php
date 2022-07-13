<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/LanguageController.php");
?>

<div class="col-md-7">
    <h1 class="text-center">Idiomas 
        <span class="botones"><a class="btn btn-outline-primary" href="new.php" role="button">Nuevo Idioma</a></span>
    </h1>

<?php
  $languages = listLanguages();
  if (count($languages) > 0){
      include_once("_list.php");
  } else {
    echo "<p class='mt-3'>No hay idiomas. Vete y crea una en <a href='/views/languages/new.php'>este enlace</a>.</p>";
  }
?>
</div>

<?php include_once("../template/html_tail.php"); ?>