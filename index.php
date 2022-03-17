<?php

use routes\Routes;

// var_dump($_REQUEST);
include_once './routes.php';
$route = new Routes;
$view = $route->redirect($_REQUEST);

include_once './src/resources/components/header/header.php';

require_once($view['router']);

include_once './src/resources/components/footer/footer.php';

