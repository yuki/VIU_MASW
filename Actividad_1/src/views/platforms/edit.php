<?php
include_once("../template/html_head.php");
require_once(__DIR__."/../../controllers/PlatformController.php");
require_once(__DIR__."/../../controllers/helpers.php");
?>

<h1>Editar plataforma</h1>

<?php
  $platform = getPlatform($_GET["id"]);

  /*
  * Parte POST, para comprobar si se crea la plataforma
  */
  if (isset($_POST["editButton"])) {
    if (strlen($_POST["name"])>0 && strlen($_POST["id"])>0) {
      $platformEdited = editPlatform($_POST["id"],$_POST["name"]);

      if ($platformEdited) {
        $platform->setName($_POST["name"]);
        // plataforma editada
        echo getAlert("plataforma","editar","success","index.php");
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



<form class="mt-2" name="edit_platform" action="" method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" required value="<?php echo $platform->getName();?>" />
    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $platform->getId();?>" />
  </div>
  <button type="submit" class="btn btn-primary" name="editButton">Submit</button>
</form>


<?php
include_once("../template/html_tail.php");
?>