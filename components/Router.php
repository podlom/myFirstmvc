<?php

namespace components;

class Router
{
<<<<<<< HEAD
    private $routes;
=======
    private  $routes;
    $routPath = ROOT.'cofig/routes.php';
    $thhis->routes = include($routerPath);
>>>>>>> 65bd1d9304ce8e8575cee216266b108fda85c44a

    public function __construct()
    {
        $routesPath = ROOT .'/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURI()
    {
        //Получить строку запроса
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {

        //Передаем сюда  строку запроса полученую в getURI()
        $uri = $this->getURI();

        //Проверяю есть ли в файле routes.php такой запрос
        foreach ($this->routes as $uriPattern => $path) {

            //Далее нужно сравнить $uripattern and $uri
            //исп тильду, чтобы разрешить использовать слеш в запросе
            if (preg_match("~$uriPattern~", $uri)) {
//Получение пути
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                //Определяю какой контроллер и action обрабатывают запрос
                $segment = explode('/', $path);

                $controllerName = array_shift($segment) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segment));
                $parameters = $segment;
                //Подключаем контроллеры
                $controllerFile = ROOT .'/controllers/' .$controllerName .'.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                //Создаем обьект
                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName($parameters);

                if ($result != null) {
                    break;
                }
            }
        }


    }


}