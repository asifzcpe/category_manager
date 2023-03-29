<?php

declare(strict_types=1);

namespace App\Core;

class Router
{
    private $routes = [];

    public function addRoute($path, $controller, $action)
    {
        $this->routes[$path] = [
            'controller' => $controller,
            'action' => $action,
        ];
    }

    public function dispatch($path)
    {
        if (!isset($this->routes[$path])) {
            throw new \Exception('Route not found');
        }

        $controllerName = $this->routes[$path]['controller'];
        $actionName = $this->routes[$path]['action'];

        $controllerClass = "\\App\\Controllers\\{$controllerName}";

        if (!class_exists($controllerClass)) {
            throw new \Exception('Controller class not found');
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $actionName)) {
            throw new \Exception('Action not found');
        }

        $controller->$actionName();
    }
}
