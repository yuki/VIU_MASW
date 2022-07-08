<?php
include_once("../template/html_head.php");
include_once("../template/delete_modal.php");
require_once("../../controllers/PlatformController.php");

// si no hay ID ponemos error
if (!isset($_GET["id"])) {
    echo "<h1>Esta plataforma no existe</h1>";
    echo "<p>Vete al listado de plataformas <a href='/views/platforms'>aquí</a></p>";
    die;
}

$platform = getPlatform($_GET["id"]);
// si no existe la plataforma ponemos error
if (!$platform) {
    echo "<h1>Esta plataforma no existe</h1>";
    echo "<p>Vete al listado de plataformas <a href='/views/platforms'>aquí</a></p>";
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