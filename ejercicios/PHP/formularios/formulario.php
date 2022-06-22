<?php
	$sector = $_POST['sector'];

	$sectors = array("Electricista", "Obrero", "Fontanero", "Carpintero", "Transportista");

	echo "La opción elegida es: $sector<br>";

	echo "La profesión correspondiente es: $sectors[$sector].";
	
?>

