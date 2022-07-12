</div>
<table class="table mt-5 align-middle">
    <tbody>
      <thead>
        <tr>
            <?php
              if (strpos($_SERVER["DOCUMENT_URI"],"tvshows") == true){
                ?>
                  <th>Plataforma</th>
                <?php
              }
            ?>
          <th class="text-center">Nombre</th>
          <th>Sinopsis</th>
          <th>enlace IMDB</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <?php
        foreach ($tvshowList as $tvshow){
      ?>
          <tr>
          <?php
              if (strpos($_SERVER["DOCUMENT_URI"],"tvshows") == true){
                ?>
                <td><a href="/views/platforms/show.php?id=<?php echo $tvshow->getPlatform()->getId(); ?>">
                        <?php
                          $imageExists = getImagePath($tvshow->getPlatform()->getId(),"platform");
                          if ($imageExists[0]){
                            echo "<img class='platform_mini' src='".$imageExists[1]."' alt='".$tvshow->getPlatform()->getName()."'>";
                          } else {
                            $tvshow->getPlatform()->getName(); 
                          }
                        ?>
                    </a>
                </td>
                <?php
              }
            ?>
            <td>
              <a href="/views/tvshows/show.php?id=<?php echo $tvshow->getId() ?>">
                <?php
                    $imageExists = getImagePath($tvshow->getId(),"tvshow");
                    if ($imageExists[0]){
                      echo "<img class='imagen' src='".$imageExists[1]."'>";
                    }
                ?>
                <?php echo $tvshow->getName() ?></a>
            </td>
            <td class="col-md-2"><?php echo $tvshow->getSinopsis() ?></td>
            <?php 
              //si hay URL de IMDB
              if ($tvshow->getUrl()) {
                ?>
                <td><a target="_blank" href="<?php echo $tvshow->getUrl() ?>">IMDB</a></td>
                <?php
              } else {
                ?>
                <td></td>
                <?php
              }
            ?>
            
            <td>
                <a class="btn btn-outline-success btn-sm" href="/views/episodes/new.php?tvshow_id=<?php echo $tvshow->getId() ?>" role="button">Crear Episodio</a>
                <a class="btn btn-outline-warning btn-sm" href="/views/tvshows/edit.php?id=<?php echo $tvshow->getId() ?>" role="button">Editar</a>
                <a class="btn btn-outline-danger btn-sm" 
                  onclick="getDependencies(<?php echo $tvshow->getId() ?> ,
                                          'tvshows',
                                          'serie',
                                          'episodios'
                                          )" 
                  role="button">Borrar</a>
            </td>
          </tr>
      <?php
        }
      ?>
      
    </tbody>
</table>