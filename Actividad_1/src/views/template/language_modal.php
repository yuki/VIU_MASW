<!-- Modal -->
<div class="modal fade" id="LanguageModal" tabindex="-1" aria-labelledby="LanguageModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="LanguageModalLabel">Añadir idioma a "<?php echo $episode->getName() ?>"</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form class="mt-2 col-md-12" name="create_platform" action="" method="POST">
            <div class="mb-3">
              <label for="language_id" class="form-label">Idioma</label>
              <select class="form-select" aria-label="default-select" id="language_id" name="language_id" required>
                <option value=0>Elige Idioma</option>
                <?php
                  foreach ($languages as $language) {
                    ?>
                    <option value="<?php echo $language->getId();?>">
                      <?php echo $language->getName() ." (".$language->getRFCCode().")" ;?>
                    </option>
                    <?php
                  }
                ?>
              </select>
            </div>

            <div class="mb-3">
              <label for="type_id" class="form-label">Tipo</label>
              <select class="form-select" aria-label="default-select" id="type_id" name="type" required>
                <option value=0>Tipo</option>
                <?php
                  foreach ($tipos as $tipo) {
                    ?>
                    <option value="<?php echo $tipo;?>">
                      <?php echo $tipo;?>
                    </option>
                    <?php
                  }
                ?>
              </select>
            </div>
            <input type="hidden" class="form-control" id="episode_id" name="episode_id" value="<?php echo $episode->getId(); ?>" />
            <button type="submit" class="btn btn-success" id="idioma" name="addLanguage">Añadir</button>
        </form>


      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<!-- / Modal -->