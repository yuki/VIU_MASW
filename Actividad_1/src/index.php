<?php
include_once("views/template/html_head.php");
require_once("controllers/CelebrityController.php");
?>
<div class="col-md-7">
  <?php
  $celebrities = listRandomCelebrities();
  if ($celebrities){
    ?>
    <div class="container">
        <h1>Celebrities en la cresta</h1>
          <div class="row">
              <?php
              foreach ($celebrities as $celebrity) {
                ?>
                  <div class="text-center carrousel">
                    <?php
                      $celebrityImage=getImagePath($celebrity->getId(),"celebrity");
                      echo "<a href='/views/celebrities/show.php?id=".$celebrity->getId()."'>";
                      if ($celebrityImage[0]){
                          echo "<img class='imagen_carrousel' src='$celebrityImage[1]'>";
                      }
                      echo $celebrity->getName()." ". $celebrity->getSurname()."</a>";
                    ?>
                  </div>
                <?php
              }
              ?>
          </div>
    </div>
      <?php
  }
  ?>

<?php
  $tvshowList = listRandomTVShows();
  if ($tvshowList){
    ?>
    <div class="container mt-5">
        <h1>Quizá quieras ver...</h1>
          <div class="row">
              <?php
              foreach ($tvshowList as $tvshow) {
                ?>
                  <div class="text-center carrousel">
                    <?php
                      echo "<a href='/views/tvshows/show.php?id=".$tvshow->getId()."'>";
                      $tvshowImage=getImagePath($tvshow->getId(),"tvshow");
                      if ($tvshowImage[0]){
                          echo "<img class='imagen_carrousel' src='$tvshowImage[1]'>";
                      }
                      echo $tvshow->getName()."</a>";
                    ?>
                  </div>
                <?php
              }
              ?>
          </div>
    </div>
      <?php
  }
  ?>


<?php
  $episodeList = listRandomEpisodes();
  if ($episodeList){
    ?>
    <div class="container mt-5">
        <h1>¿Has visto estos episodios?</h1>
          <div class="row">
              <?php
              foreach ($episodeList as $episode) {
                ?>
                  <div class="text-center carrousel">
                    <?php
                      $episodeImage=getImagePath($episode->getId(),"episode");
                      echo "<a href='/views/episodes/show.php?id=".$episode->getId()."'>";
                      if ($episodeImage[0]){
                          echo "<img class='imagen_carrousel' src='$episodeImage[1]'>";
                      }
                      echo $episode->getName()."</a>";
                    ?>
                  </div>
                <?php
              }
              ?>
          </div>
    </div>
      <?php
  }
?>

</div>
<?php
include_once("views/template/html_tail.php");
?>