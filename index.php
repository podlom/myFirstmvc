<?php



//require '../components/Loader.php';
//
//$loader = new Loader();
//spl_autoload_register([$loader, 'loadClass']);

ini_set('display errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
require_once(ROOT .'/components/Router.php');
require_once(ROOT .'/components/Db.php');


$router = new \components\Router();
$router->run();
