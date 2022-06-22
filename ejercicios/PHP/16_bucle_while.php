<html>
	<body>

		<?php

			while (condicion) {
				sentencias a ejecutar;
			}
		?>

		<?php

			$alumnos = ['Pedro', 'Marta', 'Alberto', 'Carolina', 'Rubén'];
			$i = 0;

			while($alumno != 'Rubén') {
				$alumno = $alumnos($i);
				echo "Nombre del alumno " . $alumno . "<br>";
				$i++:
			}

		?>


		<?php

			$alumnos = ['Pedro', 'Marta', 'Alberto', 'Carolina', 'Rubén'];
			$i = 0;

			do {

				$alumno = $alumnos($i);
				echo "Nombre del alumno " . $alumno . "<br>";
				$i++:
			}

			while($alumno != 'Pedro');

		?>

	</body>
</html>