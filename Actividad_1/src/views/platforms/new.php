<?php
include_once("../template/html_head.php");
require_once(__DIR__."/../../controllers/PlatformController.php");
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
        ?>
          <div class="alert alert-success" role="alert">
            La plataforma se ha creado. <a href="index.php" class="alert-link">Vete al listado de plataformas</a>.
          </div>
        <?php
      } else {
        // ha habido error al crear la plataforma
        ?>
          <div class="alert alert-danger" role="alert">
            ¡Ha habido un error al crear la plataforma! <br> 
            <strong>¿Quizá la plataforma ya existe?</strong>
          </div>
        <?php
      }
    } else {
      // No se ha introducido nombre de plataforma
      ?>
        <div class="alert alert-danger" role="alert">
          ¡Debes introducir el nombre de la plataforma!
        </div>
      <?php
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