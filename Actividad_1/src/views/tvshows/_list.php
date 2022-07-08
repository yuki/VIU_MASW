<table class="table mt-5">
    <tbody>
      <thead>
        <tr><th>Nombre</th><th>Plataforma</th><th>enlace IMDB</th><th>Acciones</th></tr>
      </thead>
      <?php
        foreach ($tvshowList as $tvshow){
      ?>
          <tr>
            <td><?php echo $tvshow->getName() ?></td>
            <td><a href="/views/platforms/show.php?id=<?php echo $tvshow->getPlatform()->getId(); ?>"><?php echo $tvshow->getPlatform()->getName(); ?></a></td>
            <?php 
              //si hay URL de IMDB
              if ($tvshow->getUrl()) {
                ?>
                <td><a href="<?php echo $tvshow->getUrl() ?>">IMDB</a></td>
                <?php
              } else {
                ?>
                <td></td>
                <?php
              }
            ?>
            
            <td>
                <a class="btn btn-outline-warning btn-sm" href="edit.php?id=<?php echo $tvshow->getId() ?>" role="button">Editar</a>
                <a class="btn btn-outline-danger btn-sm" onclick="getTVShowEpisodes(<?php echo $tvshow->getId() ?>)" role="button">Borrar</a>
            </td>
          </tr>
      <?php
        }
      ?>
      
    </tbody>
</table>