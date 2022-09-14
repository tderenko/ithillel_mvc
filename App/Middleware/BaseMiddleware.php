<?php

namespace App\Middleware;

use Core\App;
use Core\Base\Middleware;
use Core\Request;
use Core\View;

class BaseMiddleware extends Middleware
{
    public function process(App $app): bool
    {
        $app::$request = new Request();
        $app::$app = $app;
        $app::$view = new View();
        return true;
    }
}
