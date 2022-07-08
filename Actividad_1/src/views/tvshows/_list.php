<table class="table mt-5">
    <tbody>
      <thead>
        <tr><th>Nombre</th><th>Plataforma</th><th>enlace IMDB</th><th>Acciones</th></tr>
      </thead>
      <?php
        foreach ($tvshowList as $tvshow){
      ?>
          <tr>
            <td><a href="/views/tvshows/show.php?id=<?php echo $tvshow->getId() ?>"><?php echo $tvshow->getName() ?></a></td>
            <td><a href="/views/platforms/show.php?id=<?php echo $tvshow->getPlatform()->getId(); ?>"><?php echo $tvshow->getPlatform()->getName(); ?></a></td>
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
                                          'capítulos'
                                          )" 
                  role="button">Borrar</a>
            </td>
          </tr>
      <?php
        }
      ?>
      
    </tbody>
</table>