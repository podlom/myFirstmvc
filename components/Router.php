<?php
namespace components;

class Router
{
    private  $routes;


    public function __construct()
    {
        $routPath = ROOT.'cofig/routes.php';
        $this->routes = include($routPath);
    }
    public function run() {
        echo 'Router is working!';
    }
}