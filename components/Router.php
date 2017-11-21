<?php

namespace components;

class Router
{

    private  $routes;


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
                $segment = explode('/', $internalRoute);

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
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                if ($result != null) {
                    break;
                }
            }
        }


    }


}