<!-- Modal -->
<div class="modal fade" id="FilmographyModal" tabindex="-1" aria-labelledby="FilmographyModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="FilmographyModalLabel">
          <?php
            if (strpos($_SERVER["DOCUMENT_URI"],"celebrities") == true){
              echo "Añadir filmografía a ".$celebrity->getName() ." ". $celebrity->getSurname();
            } else {
              echo "Añadir casting a ".$episode->getName();
            }
          ?>
        
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form class="mt-2 col-md-12" name="add_filmography" action="" method="POST">
          <?php
            if (strpos($_SERVER["DOCUMENT_URI"],"celebrities") == true){
          ?>
                <div class="mb-3">
                  <label for="episode_id" class="form-label">Elige Serie</label>
                  <select class="form-select" aria-label="default-select" id="episode_id" name="episode_id" required>
                    <option value=0>Elige Episodio de serie</option>
                    <?php
                      foreach ($allEpisodes as $episode) {
                        ?>
                        <option value="<?php echo $episode[0];?>">
                          <?php echo $episode[1];?>
                        </option>
                        <?php
                      }
                    ?>
                  </select>
                </div>
          <?php
            } else {
          ?>
                <div class="mb-3">
                  <label for="celebrity_id" class="form-label">Elige Celebrity</label>
                  <select class="form-select" aria-label="default-select" id="celebrity_id" name="celebrity_id" required>
                    <option value=0>Elige celebrity del episodio</option>
                    <?php
                      foreach ($listCelebrities as $celebrity) {
                        ?>
                        <option value="<?php echo $celebrity->getId();?>">
                          <?php echo $celebrity->getName()." ".$celebrity->getSurname();?>
                        </option>
                        <?php
                      }
                    ?>
                  </select>
                </div>
          <?php
            }  
          ?>
            <div class="mb-3">
              <label for="funcion_id" class="form-label">Elige Función</label>
              <select class="form-select" aria-label="default-select" id="funcion_id" name="funcion" required>
                <option value=0>Función realizada</option>
                <?php
                  foreach ($funciones as $funcion) {
                    ?>
                    <option value="<?php echo $funcion;?>">
                      <?php echo $funcion;?>
                    </option>
                    <?php
                  }
                ?>
              </select>
            </div>

            <?php
              if (strpos($_SERVER["DOCUMENT_URI"],"celebrities") == true){
            ?>
                <input type="hidden" class="form-control" id="celebrity_id" name="celebrity_id" value="<?php echo $celebrity->getId(); ?>" />
            <?php
              } else {
            ?>
                <input type="hidden" class="form-control" id="episode_id" name="episode_id" value="<?php echo $episode->getId(); ?>" />
            <?php
              }  
            ?>
            
            <button type="submit" class="btn btn-success" id="addFilmography" name="addFilmography">Añadir</button>
        </form>


      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
<!-- / Modal -->