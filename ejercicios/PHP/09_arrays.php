<html>
	<body>

		<?php

			$alumnos = array("Pepe", "Juan", "Amparo", "Ramón", "Alicia", "Cristina");

			$primerAlumno = $alumnos[0];
			$segundoAlumno = $alumnos[1];
			$terceroAlumno = $alumnos[2];
			$cuartoAlumno = $alumnos[3];
			$quintoAlumno = $alumnos[4];
			$sextoAlumno = $alumnos[5];

			$alumnos[3] = "Otro";
			$alumnos[] = "Penultimo";
			$alumnos[] = "Ultimo";
			print_r($alumnos);
			echo '<br>';

			echo "primer alumno: " . $primerAlumno;
		?>

	</body>
</html>