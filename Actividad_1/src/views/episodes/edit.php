<?php
include_once("../template/html_head.php");
require_once("../../controllers/TVShowController.php");
require_once("../../controllers/EpisodeController.php");
require_once("../../controllers/helpers.php");
?>

<div class="col-md-7">
    <h1>Editar episodio</h1>

    <?php
        $episode = getEpisode($_GET["id"]);
      /*
      * Parte POST, para comprobar si se edita el episodio
      */
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo checkEpisodePost($_POST,$_FILES);
      } else {
        $tvshowList = listTVShows();
        include("_form.php");
      }
    ?>
</div>

<?php include_once("../template/html_tail.php"); ?>