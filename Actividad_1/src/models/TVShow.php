<?php

require_once("Platform.php");
require_once(__DIR__."/../controllers/PlatformController.php");

/*
* Clase TVShow
*/

class TVShow {
    private $id;
    private $name;
    private $url;
    private Platform $platform;

    public function __construct($id, $name,$platform_id,$url="",) {
        $this->id = $id;
        $this->name = $name;
        $this->url  = $url;
        $this->platform = getPlatform($platform_id);
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
    }


    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url)
    {
        $this->url = $url;
    }

    public function getPlatform()
    {
        return $this->platform;
    }

    public function setPlatform($platform_id)
    {
        $this->platform = $platform_id;
    }
}
?>