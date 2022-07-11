<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/PlatformController.php");
?>

<h1>Plataformas</h1>

<a class="btn btn-outline-primary" href="new.php" role="button">Nueva Plataforma</a>

<?php
  $platformList = listPlatforms();
  if (count($platformList) > 0){
  ?>

  <div class="col-md-5">
  <table class="table mt-5 ">
    <tbody>
      <?php
        foreach ($platformList as $platform){
      ?>
          <tr>
            <td><a href="/views/platforms/show.php?id=<?php echo $platform->getId(); ?>"><?php echo $platform->getName(); ?></a></td>
            <td class="">
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
  </div>


  <?php
  } else {
    echo "<p class='mt-3'>No hay plataformas. Crea una a través del botón.</p>";
  }
  
  include_once("../template/html_tail.php");
?>