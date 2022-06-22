<?php
	$name = $_POST['name'];
	$children = $_POST['children'];
	$years = $_POST['years'];
	$hiddenElement = $_POST['hiddenElement'];

	echo "El nombre seleccionado es '$name'<br>";
	echo "La selección de hijos es: $children<br>";
	echo "La edad de los hijos es: $years<br>";
	echo "Elemento oculto: '$hiddenElement'<br>";
	
?>

