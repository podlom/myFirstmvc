<?php
use app\Router;
//require  '../app/components/Router.php';
require '../app/components/Loader.php';

$loader = new Loader();
spl_autoload_register([$loader, 'loadClass']);

$run = new Router();
echo $run->run();