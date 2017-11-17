<?php
namespace components;

class Router
{
    private  $routes;
    $routPath = ROOT .'/cofig/routes.php';
    public function __construct()
    {

    }
    public function run() {
        echo 'Router is working!';
    }
}