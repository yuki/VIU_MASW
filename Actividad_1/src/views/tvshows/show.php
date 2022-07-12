<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/TVShowController.php");

$error = false;
// si no hay ID ponemos error
if (!isset($_GET["id"])) {
    echo getAlert("serie","mostrar","danger","index.php");
    die;
}

$tvshow = getTVShow($_GET["id"]);
// por si el id es malo
if (!$tvshow) {
    echo getAlert("serie","mostrar","danger","index.php");
    die;
}
?>

<div class="container">
  <div class="row">
    <div class="offset-md-1 col-md-3">
        <?php

        $tvshowImage=getImagePath($tvshow->getId(),"tvshow");

        if ($tvshowImage[0]){
            echo "<img class='imagen_grande' src='$tvshowImage[1]'>";
        }
        ?>
    </div>
    <div class='col'>
        
        <h1>Episodios de '<?php echo $tvshow->getName() ?>'
            <a class="btn btn-outline-warning btn-sm" href="/views/tvshows/edit.php?id=<?php echo $tvshow->getId() ?>" role="button">Editar</a>
        </h1>

    
        <?php
        echo $tvshow->getSinopsis();

        $episodeList = getTVShowEpisodes($tvshow->getId());

        if ($episodeList) {
            include_once("../episodes/_list.php");
        } else {
            echo '<p>Esta serie no tiene capítulos. <a href="/views/episodes/new.php?tvshow_id='.$tvshow->getId().'">Vete y crea uno.</a></p>';
        }
        include_once("../template/html_tail.php");
        ?>
    </div>
  </div>
</div>