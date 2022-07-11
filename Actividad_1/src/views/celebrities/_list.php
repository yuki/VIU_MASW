<table class="table mt-5 align-middle">
    <tbody>
      <thead>
        <tr>
          <th></th>
          <th>Nombre y apellidos</th>
          <th>Fecha de nacimiento</th>
          <th>Nacionalidad</th>
          <th>URL en IMDB</th>
          <th>Acciones</th></tr>
      </thead>
      <?php
        foreach ($celebritiesList as $celebrity){
      ?>
          <tr>
            <td class="text-center">
                <?php
                    $imageExists = getImagePath($celebrity->getId(),"celebrity");
                    if ($imageExists[0]){
                      echo "<img class='imagen' src='".$imageExists[1]."'>";
                    }
                ?>
            </td>
            <td><a href="/views/celebrities/show.php?id=<?php echo $celebrity->getId() ?>"><?php echo $celebrity->getName() .' '. $celebrity->getSurname() ?></a></td>
            <td><?php echo $celebrity->getBorn(); ?></td>
            <td><?php echo $celebrity->getNation(); ?></td>
            <?php 
              //si hay URL de IMDB
              if ($celebrity->getUrl()) {
                ?>
                <td><a target="_blank" href="<?php echo $celebrity->getUrl() ?>">IMDB</a></td>
                <?php
              } else {
                ?>
                <td></td>
                <?php
              }
            ?>
            <td>
                <a class="btn btn-outline-warning btn-sm" href="/views/celebrities/edit.php?id=<?php echo $celebrity->getId() ?>" role="button">Editar</a>
                <a class="btn btn-outline-danger btn-sm" 
                  onclick="getDependencies(<?php echo $celebrity->getId() ?> ,
                                          'celebrities',
                                          'celebrity',
                                          'apariciones'
                                          )"
                  role="button">Borrar</a>
            </td>
          </tr>
      <?php
        }
      ?>
      
    </tbody>
</table>