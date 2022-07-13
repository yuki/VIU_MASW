<table class="table mt-3 align-middle text-center">
    <tbody>
      <thead>
        <tr>
          <?php
            if (strpos($_SERVER["DOCUMENT_URI"],"celebrities") != true){
              echo "<th>Nombre y apellidos</th>";
            } else {
              echo "<th>Serie</th><th>Episodio</th>";
            }
          ?>
          <th>Función</th>
          <th></th>
          <th>Acciones</th>
        </tr>
      </thead>
      <?php
        foreach ($celebrityFilmography as $filmography){
      ?>
          <tr>
            <?php
              if (strpos($_SERVER["DOCUMENT_URI"],"celebrities") != true){
                  echo "<td><a href='/views/celebrities/show.php?id=".$filmography[0]->getId()."'>";
                    $imageExists = getImagePath($filmography[0]->getId(),"celebrity");
                    if ($imageExists[0]){
                      echo "<img class='imagen' src='".$imageExists[1]."'><br>";
                    }
                echo "".$filmography[0]->getName()." ".$filmography[0]->getSurname()."</a></td>";
              } else {
                echo "<td><a href='/views/tvshows/show.php?id=".$filmography[0]->getTVShow()->getId() ."'>".$filmography[0]->getTVShow()->getName()."</td>";
                echo "<td><a href='/views/episodes/show.php?id=".$filmography[0]->getId() ."'>". $filmography[0]->getName() ."</a></td>";
              }
            ?>
            
            <td><?php echo $filmography[1] ?></td>
            <?php
              if (strpos($_SERVER["DOCUMENT_URI"],"celebrities") != true){
                  //si hay URL de IMDB
                  if ($filmography[0]->getUrl()) {
                    ?>
                    <td><a target="_blank" href="<?php echo $filmography[0]->getUrl() ?>">IMDB</a></td>
                    <?php
                  } else {
                    ?>
                    <td></td>
                    <?php
                  }
              } else {
                  echo "<td></td>";
              }
            ?>
            <td>
              <?php
                if (strpos($_SERVER["DOCUMENT_URI"],"celebrities") != true){
                  // para borrar celebrities de un episodio estando en un celebrity
                  ?>
                    <a class="btn btn-outline-danger btn-sm" 
                      onclick="confirmDeleteCasting(<?php echo $episode->getId() ?> ,
                                              <?php echo $filmography[0]->getId() ?>,
                                              '<?php echo $filmography[1] ?>',
                                              )"
                      role="button">Borrar</a>
                  <?php 
                } else {
                  // para borrar celebrities de un episodio estando en un episodio
                  ?>
                    <a class="btn btn-outline-danger btn-sm" 
                      onclick="confirmDeleteFilmography(<?php echo $celebrity->getId() ?> ,
                                              <?php echo $filmography[0]->getId() ?>,
                                              '<?php echo $filmography[1] ?>',
                                              )"
                      role="button">Borrar</a>
                  <?php
                }
                  ?>
            </td>
          </tr>
      <?php
        }
      ?>
      
    </tbody>
</table>