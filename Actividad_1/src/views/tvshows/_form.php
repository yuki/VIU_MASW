<form class="mt-2 offset-md-2 name="create_tvshow" action="" method="POST" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" required value="<?php if (isset($tvshow)) {echo $tvshow->getName();} ?>"/>
  </div>
  <div class="mb-3">
    <label for="url" class="form-label">URL de IMDB</label>
    <input type="text" class="form-control" id="url" name="url" value="<?php if (isset($tvshow)) {echo $tvshow->getUrl();} ?>"/>
  </div>
  
  <div class="mb-3">
    <label for="platform_id" class="form-label">Elige Plataforma donde se encuentra</label>
    <select class="form-select" aria-label="default-select" id="platform_id" name="platform_id" required>
      <option value=0>Elige plataforma</option>
      <?php
        foreach ($platformList as $platform) {
          ?>
          <option value="<?php echo $platform->getId();?>"
            <?php
              // para seleccionar esta opción en el select.
              if (isset($tvshow)) {
                if ($tvshow->getPlatform()->getId() == $platform->getId()){
                  echo "selected";
                }
              }
              if (isset($_GET["platform_id"])){
                if ($platform->getId() == $_GET["platform_id"]){
                  echo "selected";
                }
              }
            ?>
          >
            <?php echo $platform->getName();?>
          </option>
          <?php
        }
      ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="sinopsis" class="form-label">Sinopsis</label>
    <textarea type="textarea" class="form-control" name="sinopsis" id="file" rows="3"><?php if (isset($tvshow)) {echo $tvshow->getSinopsis();} ?></textarea>
  </div>
  <div class="mb-3">
    <label for="file" class="form-label">Elige imagen</label>
    <input type="file" class="form-control" name="file" id="file">
  </div>
  <div class="mb-3">
    <?php
        if (isset($tvshow)) {
            $button_name = "Editar";
            echo '<input type="hidden" class="form-control" id="id" name="id" value="'.$tvshow->getId().'" />';
        } else {
            $button_name = "Crear";
        }
    ?>
  </div>
  <button type="submit" class="btn btn-primary" name="<?php echo $button_name ?>"><?php echo $button_name ?></button>
</form>