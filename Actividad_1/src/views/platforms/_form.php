<form class="mt-2" name="create_platform" action="" method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" required value="<?php if (isset($platform)) {echo $platform->getName();} ?>"/>

    <?php
        if (isset($platform)) {
            $button_name = "Editar";
            echo '<input type="hidden" class="form-control" id="id" name="id" value="'.$platform->getId().'" />';
        } else {
            $button_name = "Crear";
        }
    ?>
  </div>
  <input type="hidden" class="form-control" id="iction" name="action" value="<?php echo $button_name; ?>" />
  <button type="submit" class="btn btn-primary" name="Button"><?php echo $button_name ?></button>
</form>