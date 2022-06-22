<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
  </head>
  <body>
    <?php 
      $temp = [15,16,12,12.5,14,14.5,18,14,14,15,17,13,13.5,
          14.5,12.5,11,10,9,11,14,13,13,13,12.5,12,12.5,13,14,11,10];


      $totalValues = 0;
      $totalElements = count($temp);
      foreach($temp as $tempItem) {
        $totalValues += $tempItem;
      }

      $avgTemperature = $totalValues / $totalElements;
      echo "La temperatura media en este mes fue de " . round($avgTemperature, 2) . " ºC";
    ?>
  </body>
</html>

