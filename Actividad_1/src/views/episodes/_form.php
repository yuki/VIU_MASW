<form class="mt-2 col-md-5" name="create_episode" action="" method="POST">
  <div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" required value="<?php if (isset($episode)) {echo $episode->getName();} ?>"/>
  </div>
  <div class="mb-3">
    <label for="date">Fecha de emisión</label>
    <input class="form-control" type="date" id="date" name="released"
      <?php
        if (isset($episode)) {
          echo 'value="'.$episode->getDate().'"';
        }
      ?>
    >
  </div>
  
  <div class="mb-3">
    <label for="tvshow_id" class="form-label">Elige Serie</label>
    <select class="form-select" aria-label="default-select" id="tvshow_id" name="tvshow_id" required>
      <option value=0>Elige la serie</option>
      <?php
        foreach ($tvshowList as $tvshow) {
          ?>
          <option value="<?php echo $tvshow->getId();?>"
            <?php
              // para seleccionar esta opción en el select.
              if (isset($episode)) {
                if ($episode->getTVShow()->getId() == $tvshow->getId()){
                  echo "selected";
                }
              }
              if (isset($_GET["tvshow_id"])){
                if ($tvshow->getId() == $_GET["tvshow_id"]){
                  echo "selected";
                }
              }
            ?>
          >
            <?php echo $tvshow->getName();?>
          </option>
          <?php
        }
      ?>
    </select>
  </div>
  <div class="mb-3">
    <?php
        if (isset($episode)) {
            $button_name = "Editar";
            echo '<input type="hidden" class="form-control" id="id" name="id" value="'.$episode->getId().'" />';
        } else {
            $button_name = "Crear";
        }
    ?>
  </div>
  <input type="hidden" class="form-control" id="iction" name="action" value="<?php echo $button_name; ?>" />
  <button type="submit" class="btn btn-primary" name="Button"><?php echo $button_name ?></button>
</form>