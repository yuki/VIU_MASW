<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/PlatformController.php");
?>

<div class="col-md-7">
  <h1 class="text-center">Plataformas 
      <span class="botones"><a class="btn btn-outline-primary" href="new.php" role="button">Nueva Plataforma</a></span>
  </h1>


<?php
  $platformList = listPlatforms();
  if (count($platformList) > 0){
  ?>

  
  <table class="table mt-5 align-middle text-center">
    <tbody>
      <?php
        foreach ($platformList as $platform){
      ?>
        <tr>
            <td>
              <a href="/views/platforms/show.php?id=<?php echo $platform->getId(); ?>">
                <?php
                    $imageExists = getImagePath($platform->getId(),"platform");
                    if ($imageExists[0]){
                      echo "<img class='imagen_platform' src='".$imageExists[1]."'><br>";
                    }
                ?>
              <?php echo $platform->getName(); ?></a>
            </td>
            <td>
                <a class="btn btn-outline-success btn-sm" href="/views/tvshows/new.php?platform_id=<?php echo $platform->getId() ?>" role="button">Crear Serie</a>
                <a class="btn btn-outline-warning btn-sm" href="edit.php?id=<?php echo $platform->getId() ?>" role="button">Editar</a>
                <a class="btn btn-outline-danger btn-sm" 
                  onclick="getDependencies(<?php echo $platform->getId() ?>,
                                          'platforms',
                                          'plataforma',
                                          'series'
                                          )" 
                  role="button">Borrar</a>
            </td>
        </tr>
      <?php
        }
      ?>
      
    </tbody>
  </table>



  <?php
    } else {
      echo "<p class='mt-3'>No hay plataformas. Crea una a través del botón.</p>";
    }
  ?>
</div>

<?php include_once("../template/html_tail.php"); ?>