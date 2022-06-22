<?php
	
	$firstNumber = $_POST['firstNumber'];
	$secondNumber = $_POST['secondNumber'];
	$thirdNumber = $_POST['thirdNumber'];
	$fourthNumber = $_POST['fourthNumber'];

	echo "El primer número introducido es: $firstNumber<br>";
	echo "El segundo número introducido es: $secondNumber<br>";
	echo "El tercer número introducido es: $thirdNumber<br>";
	echo "El cuarto número introducido es: $fourthNumber<br>";
	
	if(is_numeric($firstNumber) && is_numeric($secondNumber) && is_numeric($thirdNumber) && is_numeric($fourthNumber)) {
		$result = intval($firstNumber) + intval($secondNumber) + intval($thirdNumber) + intval($fourthNumber);	
		echo "El resultado de sumar los cuatro números introducidos es: <b>$result</b><br>";
	} else {
		echo "<p style='color:red'>Alguno de los valores introducidos no es numérico. Por favor, revíselo y vuelva a enviarlo.</p><br>";
	}
	
?>

