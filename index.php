<?php



//require '../components/Loader.php';

//spl_autoload_register([$loader, 'loadClass']);

//try {
//$loader = new Loader();
//} catch (Exception $e) {
//   echo $e->getMessage(), "\n";
//}


ini_set('display errors', 1);
error_reporting(E_ALL);

define('ROOT', dirname(__FILE__));
require_once(ROOT .'/components/Router.php');
require_once(ROOT .'/components/Db.php');


$router = new \components\Router();
$router->run();
