<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/TVShowController.php");
require_once("../../controllers/EpisodeController.php");
?>

<h1>Episodios</h1>

<a class="btn btn-outline-primary" href="new.php" role="button">Nuevo Episodio</a>

<?php
  $episodeList = listEpisodes();
  if (count($episodeList) > 0){
      include_once("_list.php");
  } else {
      $tvshowList = listTVShows();
      if (count($tvshowList) > 0){
        echo "<p class='mt-3'>No hay episodios. Crea uno a través del botón.</p>";
      } else {
        echo "<p  class='mt-3'>No hay Series. Vete y crea una en <a href='/views/tvshows/'>este enlace</a>.</p>";
      }
      
  }
  
  include_once("../template/html_tail.php");
?>