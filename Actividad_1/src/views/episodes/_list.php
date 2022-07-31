</div>
<div class="offset-md-1 col-md-10">
  <table class="table mt-5 align-middle text-center">
    <tbody>
      <thead>
        <tr>
          <th>Nombre</th>
          <?php
              if (strpos($_SERVER["DOCUMENT_URI"],"episodes") == true){
                ?>
                  <th>Serie</th>
                <?php
              }
            ?>
          <th>T</th>
          <th>E</th>
          <th>Sinopsis</th>
          <th>Emisión</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <?php
        foreach ($episodeList as $episode){
      ?>
          <tr>
            <td>
                <a href="/views/episodes/show.php?id=<?php echo $episode->getId() ?>">
                    <?php
                        $imageExists = getImagePath($episode->getId(),"episode");
                        if ($imageExists[0]){
                          echo "<img class='imagen_episodio' src='".$imageExists[1]."'><br>";
                        }
                    ?>
                    <?php echo $episode->getName() ?>
                </a>
            </td>
            <?php
              if (strpos($_SERVER["DOCUMENT_URI"],"episodes") == true){
                ?>
                  <td><a href="/views/tvshows/show.php?id=<?php echo $episode->getTVShow()->getId(); ?>">
                        <?php
                              $imageExists = getImagePath($episode->getTVShow()->getId(),"tvshow");
                              if ($imageExists[0]){
                                echo "<img class='imagen_mini' src='".$imageExists[1]."' alt='".$episode->getTVShow()->getName()."'>";
                              } else {
                                $episode->getTVShow()->getName(); 
                              }
                        ?>
                      </a>
                  </td>
                <?php
              }
            ?>
            <td><?php echo $episode->getSeason() ?></td>
            <td><?php echo $episode->getEpisode() ?></td>
            <td class="col-md-3 text-start"><?php echo $episode->getSinopsis() ?></td>
            <td><?php echo $episode->getReleased() ?></td>
            <td>
                <a class="btn btn-outline-warning btn-sm" href="/views/episodes/edit.php?id=<?php echo $episode->getId() ?>" role="button">Editar</a>
                <a class="btn btn-outline-danger btn-sm" 
                  onclick="getDependencies(<?php echo $episode->getId() ?> ,
                                          'episodes',
                                          '',
                                          ''
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