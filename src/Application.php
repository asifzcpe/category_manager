<?php

namespace App;

use App\Core\Router;

class Application
{
    public function run()
    {
        $router = new Router();

        $router->addRoute('/', 'HomeController', 'index');
        $router->addRoute('/categories', 'CategoryController', 'index');
        $router->addRoute('/category-tree', 'CategoryTreeController', 'index');

        $path = $_SERVER['REQUEST_URI'];

        try {
            $router->dispatch($path);
        } catch (\Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
