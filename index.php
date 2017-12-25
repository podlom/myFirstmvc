<?php

ini_set('display errors', 1);
error_reporting(E_ALL);


//require '../components/Loader.php';

//spl_autoload_register([$loader, 'loadClass']);

//try {
//$loader = new Loader();
//} catch (Exception $e) {
//   echo $e->getMessage(), "\n";
//}

/* @see: spl_autoload_register on http://php.net/manual/en/function.spl-autoload-register.php */

spl_autoload_register(function($class) {
    $arr = explode('/', $class);
    $prefix = array_shift($arr);

    if($prefix == 'components') {
        $prefix_file = '../components/';
    }
    $file = $prefix_file .array_shift($arr) .'.php';

    if(is_file($file)) {
        require_once $file;
    }
});


define('ROOT', dirname(__FILE__));
require_once(ROOT .'/components/Router.php');
require_once(ROOT .'/components/Db.php');


$router = new \components\Router();
$router->run();
