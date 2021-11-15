<?php

namespace app\system;


class Router
{
    public static function buildRout()
    {

        //* Controller and Action by default
        $controllerName = 'IndexController';
        $action = 'Index';

        //* Create a male, using a separator, from the ulla
        $route = explode("/", $_SERVER['REQUEST_URI']);

//print_r($route);

        if ($route[1] == '?i=1')
        {
          unset($route[1]);
        }

        //* We specify the name of the controller
        if (!empty($route[1])){
            $controllerName = ucfirst(trim($route[1], '?'));
            $controllerName = $controllerName.'Controller';
        }

        //* We specify the name method (Action)
        if (!empty($route[2])) {
            $action = ucfirst(trim($route[2], '?'));
        }

        $controllerName = '\app\controllers\\' . $controllerName;

   
        //* Create an object of the controller class and call the method (action) of this class
        $controller = new $controllerName();

        //* Check the existence of a class method
        if (!method_exists($controller, $action)){
            self::errorPage('метод  - '. $action .' -  класса '.$controllerName.'  не найден');
        }

        if (!empty($route[3])){
            $controller->$action($route[3]);
        }else{
            $controller->$action();
        }

    }

    public static function errorPage($e)
    {
        echo('<h1>Page not found 404</h1><br> <h3 style="color: blue"> * '.$e.' * </h3>') ;
        echo('<h3> <a href="http:/" style="color: red"> Go to home </a> </h3><br>') ;
        exit();
    }
}