<html>
	<body>

		<?php

			/*foreach($array as $clave => $valor) {
				sentencias bucle
			}*/
		?>

		<?php

			$alumnos = ['Pedro', 'Marta', 'Alberto', 'Carolina', 'Rubén'];

			
			foreach($alumnos as $pos => $alumno) {
				echo "El alumno en la posición " . $pos . " se llama " . $alumno . "<br>";
			}


		?>


		<?php

			$asignaturas = ["DB" => "Base de datos", "FRT" => "Programación Frontend", "BCK" => "Programación Backend"];
			
			foreach($asignaturas as $identificador => $asignatura) {
				echo "La asignatura con indentificador " . $identificador . " se llama " . $asignatura . "<br>";
			}
			
		?>

		<?php

			$asignaturas = [
				"DB" => ["Pedro", "Marta"], 
				"FRT" => ['Pedro', 'Marta', 'Alberto', 'Carolina', 'Rubén'], 
				"BCK" => ['Alberto', 'Carolina', 'Rubén']
			];

			foreach($asignaturas as $identificador => $alumnos) {
				foreach($alumnos as $alumno) {
					echo "El alumno llamado <b>" . $alumno . 
					"</b> asiste a las clases de la asignatura con indentificador <b>"
					 . $identificador . "</b><br>";	
				}
			}
		?>

	</body>
</html>