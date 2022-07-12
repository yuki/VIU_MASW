<form class="mt-2 offset-md-2" name="create_platform" action="" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" required value="<?php if (isset($platform)) {echo $platform->getName();} ?>"/>
  </div>
  <div class="mb-3">
    <label for="file" class="form-label">Elige imagen</label>
    <input type="file" class="form-control" name="file" id="file">
  </div>
  <div class="mb-3">
    <?php
        if (isset($platform)) {
            $button_name = "Editar";
            echo '<input type="hidden" class="form-control" id="id" name="id" value="'.$platform->getId().'" />';
        } else {
            $button_name = "Crear";
        }
    ?>
  </div>
  <button type="submit" class="btn btn-primary" name="<?php echo $button_name ?>"><?php echo $button_name ?></button>
</form>