<table class="table mt-5">
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
          <th>Emisión</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <?php
        foreach ($episodeList as $episode){
      ?>
          <tr>
            <td><a href="/views/episodes/show.php?id=<?php echo $episode->getId() ?>"><?php echo $episode->getName() ?></a></td>
            <?php
              if (strpos($_SERVER["DOCUMENT_URI"],"episodes") == true){
                ?>
                  <td><a href="/views/tvshows/show.php?id=<?php echo $episode->getTVShow()->getId(); ?>"><?php echo $episode->getTVShow()->getName(); ?></a></td>
                <?php
              }
            ?>
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