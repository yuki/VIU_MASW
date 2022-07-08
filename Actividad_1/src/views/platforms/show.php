<?php
// si no hay ID volvemos a la portada
if (!isset($_GET["id"])) {
    header('Location: /');
    exit();
}

include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/PlatformController.php");

$platform = getPlatform($_GET["id"]);

if (!$platform) {
    echo "<h1>Esta plataforma no existe</h1>";
    die;
}

echo "<h1>".$platform->getName()."</h1>";

$tvshowList = getPlatformShows($platform->getId());

if ($tvshowList) {
    include_once("../tvshows/_list.php");
} else {
    echo '<p>Esta plataforma no tiene series. <a href="/views/tvshows/">Vete y crea una.</a></p>';
}
include_once("../template/html_tail.php");
?>