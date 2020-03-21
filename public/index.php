<?php
require('../vendor/autoload.php');

//To distinct easily a prod environment & a dev environment
require('../config/dev.php');
//require('../config/prod.php');


//Call the router
$router = new \App\config\Router();
$router->run();