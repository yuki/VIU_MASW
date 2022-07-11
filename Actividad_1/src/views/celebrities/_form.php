<form class="mt-2 col-md-5" name="create_celebrity" action="" method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" required value="<?php if (isset($celebrity)) {echo $celebrity->getName();} ?>"/>
  </div>
  <div class="mb-3">
    <label for="surname" class="form-label">Apellidos</label>
    <input type="text" class="form-control" id="surname" name="surname" required value="<?php if (isset($celebrity)) {echo $celebrity->getSurname();} ?>"/>
  </div>
  <div class="mb-3">
    <label for="born">Fecha de nacimiento</label>
    <input class="form-control" type="date" id="born" name="born"
      <?php
        if (isset($celebrity)) {
          echo 'value="'.$celebrity->getDate().'"';
        }
      ?>
    >
  </div>

  <div class="mb-3">
    <label for="nation" class="form-label">País de origen</label>
    <input type="text" class="form-control" id="nation" name="nation"  value="<?php if (isset($celebrity)) {echo $celebrity->getNation();} ?>"/>
  </div>
  <div class="mb-3">
    <label for="url" class="form-label">URL en IMDB</label>
    <input type="text" class="form-control" id="url" name="url"  value="<?php if (isset($celebrity)) {echo $celebrity->getUrl();} ?>"/>
  </div>
  
  <div class="mb-3">
    <?php
        if (isset($celebrity)) {
            $button_name = "Editar";
            echo '<input type="hidden" class="form-control" id="id" name="id" value="'.$celebrity->getId().'" />';
        } else {
            $button_name = "Crear";
        }
    ?>
  </div>
  <input type="hidden" class="form-control" id="iction" name="action" value="<?php echo $button_name; ?>" />
  <button type="submit" class="btn btn-primary" name="Button"><?php echo $button_name ?></button>
</form>