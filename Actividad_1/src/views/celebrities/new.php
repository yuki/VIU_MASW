<?php
include_once("../template/html_head.php");
require_once("../../controllers/CelebrityController.php");
require_once("../../controllers/helpers.php");
?>

<h1>Añadir celebrity</h1>

<?php
  /*
  * Parte POST, para comprobar si se crea la celebrity
  */
  if (isset($_POST["Button"])) {
    if (strlen($_POST["name"])>0 && strlen($_POST["surname"])>0) {
      $celebrityCreated = createCelebrity($_POST["name"],$_POST["surname"],$_POST["born"],$_POST["nation"],$_POST["url"],$_FILES);

      if ($celebrityCreated) {
        // plataforma creada
        echo getAlert("celebrity","crear","success","index.php");
      } else {
        // ha habido error al crear la celebrity
        echo getAlert("celebrity","crear","danger","index.php");
      }
    } else {
      // No se ha introducido nombre de celebrity
      echo getAlert("celebrity","falta","danger","index.php");
    }
  } else {
    include("_form.php");
  }

include_once("../template/html_tail.php");
?>