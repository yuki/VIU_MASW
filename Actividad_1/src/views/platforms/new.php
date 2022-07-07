<?php
include_once("../template/html_head.php");
require_once(__DIR__."/../../controllers/PlatformController.php");
require_once(__DIR__."/../../controllers/helpers.php");
?>

<h1>Crear plataforma</h1>

<?php
  /*
  * Parte POST, para comprobar si se crea la plataforma
  */
  if (isset($_POST["createButton"])) {
    if (strlen($_POST["name"])>0) {
      $platformCreated = createPlatform($_POST["name"]);

      if ($platformCreated) {
        // plataforma creada
        echo getAlert("plataforma","crear","success","index.php");
      } else {
        // ha habido error al crear la plataforma
        echo getAlert("plataforma","error","danger","");
      }
    } else {
      // No se ha introducido nombre de plataforma
      echo getAlert("plataforma","falta","danger","");
    }
  }
?>



<form class="mt-2" name="create_platform" action="" method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" required />
  </div>
  <button type="submit" class="btn btn-primary" name="createButton">Submit</button>
</form>


<?php
include_once("../template/html_tail.php");
?>