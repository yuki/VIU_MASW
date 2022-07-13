<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/PlatformController.php");
require_once("../../controllers/helpers.php");

$error = false;
// si no hay ID ponemos error
if (!isset($_GET["id"])) {
    echo getAlert("plataforma","mostrar","danger","index.php");
    die;
}

$platform = getPlatform($_GET["id"]);
// si no existe la plataforma ponemos error
if (!$platform) {
    echo getAlert("plataforma","mostrar","danger","index.php");
    die;
}
?>
<div class="container">
  <div class="row">
    <div class="text-center">
        <?php

        $tvshowImage=getImagePath($platform->getId(),"platform");

        if ($tvshowImage[0]){
            echo "<img class='imagen_grande' src='$tvshowImage[1]'>";
        }
        ?>
        <h1>Series de <?php echo $platform->getName()?></h1>
    </div>
  </div>
    
        <?php 
        $tvshowList = getPlatformShows($platform->getId());

        if ($tvshowList) {
            include_once("../tvshows/_list.php");
        } else {
            echo '<p>Esta plataforma no tiene series. <a href="/views/tvshows/new.php?platform_id='.$platform->getId().'">Vete y crea una.</a></p>';
        }
        ?>

    </div>
  </div>
</div>

<?php include_once("../template/html_tail.php"); ?>