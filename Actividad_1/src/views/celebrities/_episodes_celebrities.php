<table class="table mt-5">
    <tbody>
      <thead>
        <tr>
          <?php
            if (strpos($_SERVER["DOCUMENT_URI"],"celebrities") != true){
              echo "<th>Nombre y apellidos</th>";
            } else {
              echo "<th>Serie</th>";
            }
          ?>
          <th>Episodio</th>
          <th>Función</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <?php
        foreach ($celebrityFilmography as $filmography){
      ?>
          <tr>
            <?php
              if (strpos($_SERVER["DOCUMENT_URI"],"celebrities") != true){
                echo "<td>as</td>";
              } else {
                echo "<td><a href='/views/tvshows/show.php?id=".$filmography[0]->getTVShow()->getId() ."'>".$filmography[0]->getTVShow()->getName()."</td>";
              }
            ?>
            <td><a href="/views/episodes/show.php?id=<?php echo $filmography[0]->getId() ?>"><?php echo $filmography[0]->getName() ?></a></td>
            <td><?php echo $filmography[1] ?></td>
            <td>
                <a class="btn btn-outline-danger btn-sm" 
                  onclick="confirmDeleteFilmography(<?php echo $celebrity->getId() ?> ,
                                          <?php echo $filmography[0]->getId() ?>,
                                          '<?php echo $filmography[1] ?>',
                                          )"
                  role="button">Borrar</a>
            </td>
          </tr>
      <?php
        }
      ?>
      
    </tbody>
</table>