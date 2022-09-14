<?php

namespace App\Middleware;

use Core\App;
use Core\Base\Middleware;
use Core\Router;

class RouterMiddleware extends Middleware
{
    public function process(App $app): bool
    {
        $router = new Router();
        require_once BASE_DIR . '/routes/web.php';
        [$controller, $app->action, $app->params] = $router->dispatch($app::$request);
        class_exists($controller) or throw new \Exception("Controller \"{$controller}\" doesn't exists!!!");
        $app->controller = new $controller;
        method_exists($app->controller, $app->action) or throw new \Exception("Action \"{$app->action}\" doesn't exists!!!");
        return true;
    }
}
