<html>
	<body>

		<?php

			$alumnos = array("nombre" => "Pepe Navarro", "telefono" => 666666666, 
				"ciudad" => "Valencia", "edad" => 29);

			echo "Nombre completo del alumno: " . $alumnos["nombre"] . '<br>';
			echo "Teléfono del alumno: " . $alumnos["telefono"] . '<br>';
			echo "Ciudad del alumno: " . $alumnos["ciudad"] . '<br>';
			echo "Edad del alumno: " . $alumnos["edad"] . '<br>';
		?>

	</body>
</html>