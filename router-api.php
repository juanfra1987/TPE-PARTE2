<?php
require_once 'lib/Router.php';
require_once 'api/ApiComentarioController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('profesional/comentario/:id', 'GET', 'ApiComentarioController', 'obtenerComentarios');
$router->addRoute('profesional/comentario/:id', 'POST', 'ApiTaskController', 'crearComentario');

// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);