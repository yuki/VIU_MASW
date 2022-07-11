<form class="mt-2 col-md-5" name="create_language" action="" method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" required value="<?php if (isset($language)) {echo $language->getName();} ?>"/>
  </div>
  <div class="mb-3">
    <label for="rfc_code" class="form-label">Código <a href="https://registry-page.isdcf.com/languages/">RFC_5646</a></label>
    <input type="text" class="form-control" id="rfc_code" name="rfc_code" required value="<?php if (isset($language)) {echo $language->getRFCCode();} ?>"/>
  </div>
  <div class="mb-3">
    <?php
        if (isset($language)) {
            $button_name = "Editar";
            echo '<input type="hidden" class="form-control" id="id" name="id" value="'.$language->getId().'" />';
        } else {
            $button_name = "Crear";
        }
    ?>
  </div>
  <input type="hidden" class="form-control" id="iction" name="action" value="<?php echo $button_name; ?>" />
  <button type="submit" class="btn btn-primary" name="Button"><?php echo $button_name ?></button>
</form>