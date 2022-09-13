<?php


namespace App\Middleware;


use Core\App;
use Core\DB;
use Core\Middleware;
use PDO;

class ConnectionMiddleware extends Middleware
{

    public function process(App $app): bool
    {
        $app::$connect = DB::init($app->config);
        return $app::$connect instanceof PDO;
    }
}
