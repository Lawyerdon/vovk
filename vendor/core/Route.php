<?php

namespace core;

class Route
{
    static public function init() {
        $URIs = explode('/', $_SERVER['REQUEST_URI']);
        array_shift($URIs);

        $controllerName = 'index';
        $actionName = 'index';
        if(!empty($URIs[0])) {
            $controllerName = mb_convert_case(mb_strtolower($URIs[0]), MB_CASE_TITLE);
        }
        if(!empty($URIs[1])) {
            $actionName = mb_strtolower($URIs[1]);
        }
        $controllerClassName = '\controllers\\'.$controllerName;
        var_dump($controllerClassName);

        if(!class_exists($controllerClassName)) {
            self::error404();
        }

        $controller = new $controllerClassName();
        if(!method_exists($controller, $actionName)) {
            self::error404();
        }
        $controller->$actionName();
    }
    static public function redirect($url = null)
    {
        if(isset($url)) {
            return $url;
        } else {
            $_SERVER['PHP_SELF'];
        }
        header('Location:'.$url);
    }
    static public function url($controllerName = 'index', $actionName = 'index')
    {
        return '/'.$controllerName.'/'.$actionName;
    }
    static public function error404() {
        http_response_code(404);
        exit();
    }
}