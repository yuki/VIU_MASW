<html>
	<body>

		<?php

			$alumnos = ["Pedro", "María", "Carlos"];
			
			foreach($alumnos as $alumno) {
				if($alumno == "María") break;

				echo "Nombre del alumno " . $alumno . '<br>';
			}

			//Imprime: 
			//Nombre del alumno Pedro
		?>

		<?php

			$alumnos = ["Pedro", "María", "Carlos"];
			
			foreach($alumnos as $alumno) {
				if($alumno == "María") continue;

				echo "Nombre del alumno " . $alumno . '<br>';
			}

			//Imprime: 
			//Nombre del alumno Pedro
			//Nombre del alumno Carlos
		?>

	</body>
</html>