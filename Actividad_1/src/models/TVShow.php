<?php

require_once("Platform.php");
require_once(__DIR__."/../controllers/PlatformController.php");

/*
* Clase TVShow
*/

class TVShow {
    private $id;
    private $name;
    private $sinopsis;
    private $url;
    private Platform $platform;

    public function __construct($id, $name, $sinopsis, $platform_id, $url="") {
        $this->id = $id;
        $this->name = $name;
        $this->sinopsis  = $sinopsis;
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

    public function getSinopsis()
    {
        return $this->sinopsis;
    }

    public function setSinopsis($sinopsis)
    {
        $this->sinopsis = $sinopsis;

        return $this;
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