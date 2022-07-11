<?php

require_once("Platform.php");
require_once(__DIR__."/../controllers/TVShowController.php");
require_once(__DIR__."/../controllers/helpers.php");

/*
* Clase Language
*/

class Language {
    private $id;
    private $name;
    private $rfc_code;

    public function __construct($id, $name,$rfc_code) {
        $this->id = $id;
        $this->name = $name;
        $this->rfc_code  = $rfc_code;
    }

    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function getRFCCode()
    {
        return $this->rfc_code;
    }

    public function setRFCCode($rfc_code)
    {
        $this->rfc_code = $rfc_code;

        return $this;
    }
}