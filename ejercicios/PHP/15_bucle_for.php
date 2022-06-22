<html>
	<body>

		<?php

			for($i=1; $i <= 10; $i++) {
				echo "Valor de la variable " . $i . "<br>";
			}
		?>

		<?php

			for($i=10; $i < 0; $i--) {
				echo "Valor de la variable " . $i . "<br>";
			}
		?>

		<?php

			for($i=1; $i <= 10; $i+=2) {
				echo "Valor de la variable " . $i . "<br>";
			}
		?>

		<?php
			for($i=1; $i <= 10; $i++) {
				for($j=0; $j <5; $j++) {
				echo "Valor de la variable " . $i . 
					" y valor de la segunda ". $j . "<br>";	
				}
			}
		?>

	</body>
</html>