<html>
	<body>

		<?php

			/*function nombreFuncion(arg1, arg2, ..., argN) {
				//cuerpo de la funcion
			}*/
		?>

		<?php

			/*function imprimirNumero() {
				echo ("Numero 6");
			}

			imprimirNumero();*/
		?>

		<?php

			/*function imprimirNumero($num) {
				echo ("Numero " . $num);
			}

			$numero = 5;
			imprimirNumero($numero);*/
		?>

		<?php

			/*function sumaNumeros($num1, $num2) {
				$resultado = $num1 + $num2;
				echo ("Resultado " . $resultado);
			}

			$numero1 = 5;
			$numero2 = 3;
			sumaNumeros($numero1, $numero2);*/
		?>

		<?php

			/*function duplicaNumero($num) {
				echo ("El doble de " . $num);
				$num *= 2;
				echo (" es " . $num . '<br>');
			}

			$numero = 5;
			echo "El número antes de llamar a la función vale " . $numero . "<br>";
			duplicaNumero($numero);
			echo "El número después de llamar a la función vale " . $numero . '<br><br><br>';
			*/
		?>

		<?php

			/*function duplicaNumero(&$num) {
				echo ("El doble de " . $num);
				$num *= 2;
				echo (" es " . $num . '<br>');
			}

			$numero = 5;
			echo "El número antes de llamar a la función vale " . $numero . "<br>";
			duplicaNumero($numero);
			echo "El número después de llamar a la función vale " . $numero;*/
		?>

		<?php

			/*function duplicaNumero($num) {
				$resulado = $num * 2;
				return $resultado;
				
			}

			$numero = 5;
			$dobleNumero = duplicaNumero($numero);
			echo "El doble del número " . $numero . " es " . $dobleNumero;*/
		?>

		<?php

			/*function duplicaNumero($num) {
				$doble = $num * 2;
				echo ("El doble de " . $num . " es " . $doble . '<br>');
				//echo "La variable \$numero dentro de la función vale " . $numero . " y es del tipo " . gettype($numero) . "<br>";
			}

			$numero = 5;
			echo "La variable \$numero fuera de la función vale " . $numero . 
			" y es del tipo " . gettype($numero) . "<br>";
			duplicaNumero($numero);			
			echo "La variable \$doble vale " . $doble . " y es del tipo " . gettype($doble);*/
		?>


		<?php

			/*function duplicaNumero($num) {
				global $numero;
				$doble = $num * 2;
				echo ("El doble de " . $num . " es " . $doble . '<br>');
				echo "La variable \$numero dentro de la función vale " . $numero . 
				" y es del tipo " . gettype($numero) . "<br>";
			}

			$numero = 5;
			echo "La variable \$numero fuera de la función vale " . $numero . " y es del tipo " 
			. gettype($numero) . "<br>";
			duplicaNumero($numero);			
			echo "La variable \$doble vale " . $doble . " y es del tipo " . gettype($doble);*/
		?>

		<?php
			/*function variablesNoEstaticas() {
				$var = 0; 
				$var +=2; //Se inicializa a 0 y se le suma 2
				echo "La variable \$var tiene inicialmente el valor " . $var . "<br>";

				$var *= 3;
				echo "La variable \$var al triplicarla tiene el valor " . $var . "<br>";
			}

			echo "Primera llamada a la función<br>";
			variablesNoEstaticas();

			echo "Segunda llamada a la función<br>";
			variablesNoEstaticas();*/
		?>

		<?php
			/*function variablesEstaticas() {
				static $var; 
				$var +=2; 
				//En la primera llamada se inicializa a 0 y se le suma 2;
				//En la segunda vale 6 inicialmente
				echo "La variable \$var tiene inicialmente el valor " . $var . "<br>";

				$var *= 3;
				echo "La variable \$var al triplicarla tiene el valor " . $var . "<br>";
			}

			echo "Primera llamada a la función<br>";
			variablesEstaticas();

			echo "Segunda llamada a la función<br>";
			variablesEstaticas();

			echo "Tercera llamada a la función<br>";
			variablesEstaticas();*/
		?>

		<?php
			function calculoFactorial($num) {
				if($num == 0) {
					return 1;
				} else {

					$factorial = $num * calculoFactorial($num-1);
					return $factorial;
				}
			}

			$numero = 5;
			$resultado = calculoFactorial($numero);

			echo "El factorial de " . $numero . " es igual a " . $resultado;
		?>

	</body>
</html>