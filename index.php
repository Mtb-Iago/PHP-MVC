<?php

use routes\Routes;

// var_dump($_REQUEST);
include_once './routes.php';
$route = new Routes;
$view = $route->redirect($_REQUEST);

// var_dump($view);
require_once($view['router']);
