<?php

/*
* Clase Platform
*/

class Platform {
    private $id;
    private $name;


    public function __construct($idPlatform, $namePlatform) {
        $this->id = $idPlatform;
        $this->name = $namePlatform;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}


?>