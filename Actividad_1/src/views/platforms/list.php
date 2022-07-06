<?php
include_once("../template/html_0init.php");
include_once("../template/nav.php");
require_once("../../controllers/PlatformController.php");

  $platformList = listPlatform();
  var_dump($platformList);


include_once("../template/html_end.php");
?>