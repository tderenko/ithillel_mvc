<?php

namespace App\Middleware;

use Core\App;
use Core\Middleware;

class BaseMiddleware extends Middleware
{
    public function process(App $app): bool
    {
        return true;
    }
}
