<html>
	<body>

		<?php

			$alumnos = array(
				array("nombre" => "Pepe Navarro", "telefono" => 666666666, 
				"ciudad" => "Valencia", "edad" => 29), 
				array("nombre" => "Cristina Martínez", "telefono" => 555555555, 
				"ciudad" => "Madrid", "edad" => 49), 
				array("nombre" => "María Giménez", "telefono" => 655655655, 
				"ciudad" => "Mexico", "edad" => 22));

			/*echo "Nombre completo del primer alumno: " . $alumnos[0]["nombre"] . "<br>";
			echo "Teléfono del primer alumno: " . $alumnos[0]["telefono"] . "<br>";
			echo "Ciudad del segundo alumno: " . $alumnos[1]["ciudad"] . "<br>";
			echo "Edad del tercer alumno: " . $alumnos[2]["edad"] . "<br>";*/
		?>

		<?php
			foreach($alumnos as $alumno) {
				switch ($alumno['ciudad']) {
					case 'Valencia':
						echo "Alumno de Valencia<br>";
						break;
					case 'Madrid':
						echo "Alumno de Madrid<br>";
						break;
					case 'Barcelona':
						echo "Alumno de Barcelona<br>";
						break;
					
					default:
						echo "Alumno de fuera de España<br>";
						break;
				}
			}
		?>

	</body>
</html>