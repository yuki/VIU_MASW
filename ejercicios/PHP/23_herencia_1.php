<?php

class Vehicle {

	private $patent;
	private $origin;
	private $year;

	function __construct($patent, $origin, $year) {
		$this->patent = $patent;
		$this->origin = $origin;
		$this->year = $year;
	}

	function showPatent() {
		return $this->patent;
	}

}


class Train extends Vehicle{

	private $seats;

	function __construct($patent, $origin, $year, $seats) {
		parent::__construct($patent, $origin, $year);

		$this->seats = $seats;
	}

}


$vehicle = new Vehicle('AA333', 'Germany', 2014);
print_r($vehicle);
echo '<br>';
echo "Patente vehicle: " . $vehicle->showPatent();
echo '<br>';
$train = new Train('ES33442', 'Spain', 2003, 23);
print_r($train);
echo '<br>';
echo "Patente train: " . $train->showPatent();


?>