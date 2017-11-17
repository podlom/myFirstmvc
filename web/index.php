<?php
use components\Router;
//require  '../app/components/Router.php';
require '../components/Loader.php';

$loader = new Loader();
spl_autoload_register([$loader, 'loadClass']);

$run = new Router();
echo $run->run();