<?php

//require("Student.php");

class Student {
	private $email;
	private $name;

	public function __construct($email, $name) {
		$this->email = $email;
		$this->name = $name;
	}

	public function __destruct() {
        echo 'Destroying: ' . $this->name . PHP_EOL;
    }

	public function showStudent() {
		$data = array('email' => $this->email, 'name' => $this->name);
		return $data;
	}

	public function getEmail() {
		return $this->email;
	}

	public function setEmail($email) {
		$this->email = $email;
	}
}

$student = new Student("prueba@prueba.es", "Pedro");
print_r($student->showStudent());
echo '<br>';
$student->setEmail("test@test.com");
print_r($student->showStudent());
echo '<br>';

?>