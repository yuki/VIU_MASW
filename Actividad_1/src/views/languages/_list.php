<table class="table mt-5 ">
    <tbody>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>RFC code</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <?php
            foreach ($languages as $language){
        ?>
            <tr>
                <td><?php echo $language->getName(); ?></td>
                <td><?php echo $language->getRFCCode(); ?></td>
                <td class="">
                    <a class="btn btn-outline-warning btn-sm" href="edit.php?id=<?php echo $language->getId() ?>" role="button">Editar</a>
                    <a class="btn btn-outline-danger btn-sm" 
                    onclick="getDependencies(<?php echo $language->getId() ?>,
                                            'languages',
                                            'languages',
                                            'idiomas'
                                            )" 
                    role="button">Borrar</a>
                </td>
            </tr>
        <?php
            }
        ?>
      
    </tbody>
  </table>