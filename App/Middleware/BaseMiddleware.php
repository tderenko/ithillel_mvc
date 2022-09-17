<?php

namespace App\Middleware;

use Core\App;
use Core\Base\Middleware;
use Core\Request;
use Core\Session;
use Core\View;

class BaseMiddleware extends Middleware
{
    public function process(App $app): bool
    {
        $app::$session = Session::init();
        $app::$request = new Request();
        $app::$app = $app;
        $app::$view = new View();
        return true;
    }
}
