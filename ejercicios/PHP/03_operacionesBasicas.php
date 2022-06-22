<html>
	<body>

		<?php

			$op1 = 4;
			$op2 = 20;

			$sum = $op1 + $op2;
			$diff = $op2 - $op1;
			$mult = $op1 * $op2;
			$div = $op2 / $op1;
			$mod = $op2 % $op1;

			echo "Valor primer operador: " . $op1 . "<br>";
			echo "Valor segundo operador: " . $op2 . "<br>";

			echo "Resultado de la suma: " . $sum . "<br>";
			echo "Resultado de la resta: " . $diff . "<br>";
			echo "Resultado de la multiplicación: " . $mult . "<br>";
			echo "Resultado de la división: " . $div . "<br>";
			echo "Resultado de la operación módulo (resto de la división): " . $mod . "<br>";
		?>

	</body>
</html>