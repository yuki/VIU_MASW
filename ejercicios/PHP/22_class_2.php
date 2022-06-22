<?php

abstract class Person {

	private $name;

	abstract public function salutation();
}


class Student extends Person{

	public function salutation() {
		echo "<br>Buenos días, ¿qué tal estás?";
	}

}


$student = new Student();
$student->salutation();

?>