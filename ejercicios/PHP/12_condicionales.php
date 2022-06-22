<html>
	<body>

		<?php

			$alumnos = array(
				array("nombre" => "Pepe Navarro", "telefono" => 666666666, 
				"ciudad" => "Valencia", "edad" => 29), 
				array("nombre" => "Cristina Martínez", "telefono" => 555555555, 
				"ciudad" => "Madrid", "edad" => 49), 
				array("nombre" => "María Giménez", "telefono" => 655655655, 
				"ciudad" => "Barcelona", "edad" => 22));

			/*echo "Nombre completo del primer alumno: " . $alumnos[0]["nombre"] . '<br>';
			echo "Teléfono del primer alumno: " . $alumnos[0]["telefono"] . '<br>';
			echo "Ciudad del segundo alumno: " . $alumnos[1]["ciudad"] . '<br>';
			echo "Edad del tercer alumno: " . $alumnos[2]["edad"] . '<br>';*/
		?>

		<?php
			foreach($alumnos as $alumno) {
				if($alumno['edad'] > 30 && $alumno['ciudad'] == "Valencia") {
					echo "Alumno mayor de 30 años y de Valencia" . '<br>';
				} else if($alumno['edad'] > 20 || $alumno['ciudad'] == "Madrid") {
					echo "Alumno mayor de 20 años o de Madrid" . '<br>';	
				} else {
					echo "Otro tipo de alumno" . '<br>';
				}

				if($alumno['ciudad'] == "Valencia") {
					echo "Alumno de Valencia<br>";	
				} else if ($alumno['ciudad'] == "Madrid") {
					echo "Alumno de Madrid<br>";	
				} else if ($alumno['ciudad'] == "Barcelona") {
					echo "Alumno de Barcelona<br>";
				} else {
					echo 'Alumno de fuera de España <br>';
				}
			}
		?>

	</body>
</html>