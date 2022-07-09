<?php

require_once("Platform.php");
require_once(__DIR__."/../controllers/TVShowController.php");
require_once(__DIR__."/../controllers/helpers.php");

/*
* Clase Episode
*/

class Episode {
    private $id;
    private $name;
    private $released;
    private TVShow $tvshow;

    public function __construct($id, $name,$tvshow_id,$released="",) {
        $this->id = $id;
        $this->name = $name;
        $this->released  = $released;
        $this->tvshow = getTVShow($tvshow_id);
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

    // fecha en castellano
    public function getReleased()
    {   
        if ($this->released) {
           return changeDateFormat($this->released);
        }
        // estará nulo
        return $this->released;
    }

    public function setReleased($released)
    {
        $this->released = $released;

        return $this;
    }

    // fecha de la base de datos sin modificar    
    public function getDate()
    {   
        return $this->released;
    }

    public function getTVShow()
    {
        return $this->tvshow;
    }

    public function setTvshow($tvshow)
    {
        $this->tvshow = $tvshow;

        return $this;
    }
}
?>