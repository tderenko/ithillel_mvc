<?php

namespace App\Middleware;

use App\Models\User;
use Core\App;
use Core\Base\Middleware;

class AuthMiddleware extends Middleware
{

    public function process(App $app): bool
    {
        $app::$user = $app::$session->getAuthUser();
        return true;
    }
}
