</div>
<div class=" col-md-7">
  <table class="table mt-5 align-middle text-center">
    <tbody>
      <thead>
        <tr>
          <th>Nombre y apellidos</th>
          <th>Nacimiento</th>
          <th>Nacionalidad</th>
          <th></th>
          <th>Acciones</th></tr>
      </thead>
      <?php
        foreach ($celebritiesList as $celebrity){
      ?>
          <tr>
            <td>
              <a href="/views/celebrities/show.php?id=<?php echo $celebrity->getId() ?>">
                <?php
                    $imageExists = getImagePath($celebrity->getId(),"celebrity");
                    if ($imageExists[0]){
                      echo "<img class='imagen' src='".$imageExists[1]."'><br>";
                    }
                ?>
               <?php echo $celebrity->getName() .' '. $celebrity->getSurname() ?>
              </a>
            </td>
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
</div>