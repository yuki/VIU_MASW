<table class="table mt-3">
    <tbody>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Función</th>
                <th>Acción</th>
            </tr>
        </thead>
        <?php
            foreach ($episodeLanguages as $language){
        ?>
            <tr>
                <td><?php echo $language[0]->getName() ." (".$language[0]->getRFCCode().")"; ?></td>
                <td><?php echo $language[1]; ?></td>
                <td class="">
                    <a class="btn btn-outline-danger btn-sm" 
                        onclick="confirmDeleteLanguageEpisode(<?php echo $episode->getId() ?>, 
                            <?php echo $language[0]->getId() ?>, 
                            '<?php echo $language[1]?>')"
                        role="button">Borrar</a>
                </td>
            </tr>
        <?php
            }
        ?>
      
    </tbody>
  </table>