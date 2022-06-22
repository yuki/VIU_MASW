<html>
	<body>

		<?php

			$op1 = 10;
			$op2 = 20;

			$postInc = $op1++;
			$preInc = ++$op2;


			echo "Resultado del post-incremento: " . $postInc . '<br>'; //10
			echo "Resultado del pre-incremento: " . $preInc . '<br>';	//21
			echo "op1 = " . $op1 . '<br>';
			echo "op2 = " . $op2 . '<br>';

			$postDec = $op1--;
			$preDec = --$op2;

			echo "Resultado del post-decremento: " . $postDec . '<br>'; 
			echo "Resultado del pre-decremento: " . $preDec . '<br>';	
			echo "op1 = " . $op1 . '<br>';
			echo "op2 = " . $op2 . '<br>';

			$incMult = $op2 + 4;

			echo "Resultado de aumentar más de una unidad: " . $incMult . '<br>';	//25		
			
		?>

	</body>
</html>

