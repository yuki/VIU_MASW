<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <?php
      $oportunidades = $_POST['oportunidades'];

      $numeroIntroducido = -1;
      if(isset($_POST['numeroIntroducido'])) {
        $numeroIntroducido = $_POST['numeroIntroducido'];  
      }
      
      const $numeroSecreto = 12;

      if ($numeroIntroducido == $numeroSecreto) {
        echo "<p style='color:green'>Enhorabuena, has acertado el número.</p>";
      } else {
        if ($oportunidades == 0) {
          echo "<p style='color:red'>Lo siento, has agotado todas tus oportunidades. ¡Has perdido!</p>";
        } else {
          echo "Tienes otra oportunidad para acertarlo.<br>";

          $oportunidades--;
        ?>
        Te quedan <b><?= $oportunidades ?></b> oportunidades para adivinar el número.<br>
        
        Introduce un número del 0 al 100
        <form action="" method="post">
          <input type="text" name="numeroIntroducido">
          <input type="hidden" name="oportunidades" value="<?= $oportunidades ?>">
          <input type="submit" value="Continuar">
        </form>
        <?php
        }
      }
    ?>
  </body>
</html>


