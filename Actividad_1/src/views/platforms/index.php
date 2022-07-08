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


  <table class="table mt-5">
    <tbody>
      <?php
        foreach ($platformList as $platform){
      ?>
          <tr>
            <td><a href="/views/platforms/show.php?id=<?php echo $platform->getId(); ?>"><?php echo $platform->getName(); ?></a></td>
            <td>
                <a class="btn btn-outline-warning btn-sm" href="edit.php?id=<?php echo $platform->getId() ?>" role="button">Editar</a>
                <a class="btn btn-outline-danger btn-sm" onclick="getPlatformShows(<?php echo $platform->getId() ?>)" role="button">Borrar</a>
            </td>
          </tr>
      <?php
        }
      ?>
      
    </tbody>
  </table>


  <?php
  } else {
    echo "<p>No hay plataformas. Crea una a través del botón.</p>";
  }
  

?>


<?php
include_once("../template/html_tail.php");
?>