<?php

require_once(__DIR__."/../controllers/helpers.php");

/*
* Clase TVShow
*/

class Celebrity {
    private $id;
    private $name;
    private $surname;
    private $born;
    private $nation;
    private $url;

    public function __construct($id, $name,$surname,$born="",$nation="",$url="") {
        $this->id = $id;
        $this->name = $name;
        $this->surname  = $surname;
        $this->born = $born;
        $this->nation = $nation;
        $this->url = $url;
    }


    public function getId()
    {
        return $this->id;
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


    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    // fecha en castellano
    public function getBorn()
    {
        if ($this->born) {
            return changeDateFormat($this->born);
        }
        return $this->born;
    }

    public function setBorn($born)
    {
        $this->born = $born;

        return $this;
    }

    // fecha de la base de datos sin modificar    
    public function getDate()
    {   
        return $this->born;
    }

    public function getNation()
    {
        return $this->nation;
    }

    public function setNation($nation)
    {
        $this->nation = $nation;

        return $this;
    }
    
    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }
}

?>