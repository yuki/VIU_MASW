<?php
require_once(__DIR__."/../../config.php");
global $conf;
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- funciones propias javascripts -->
    <script src="/assets/js/yukidb.js"></script>

    <title><?php echo $conf["app_name"] ?></title>
  </head>
  <body>

  <nav class="navbar navbar-expand-md  navbar-dark bg-dark">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="/"><?php echo $conf["app_name"] ?></a>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/views/platforms/">Plataformas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/views/tvshows/">Series</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/views/episodes/">Episodios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/views/persons/">Staff</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/views/languages/">Idiomas</a>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <main class="container mt-5">
    <div class="offset-md-3 col-md-6">
     
