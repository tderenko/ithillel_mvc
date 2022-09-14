<?php


namespace App\Middleware;


use Core\App;
use Core\Base\Middleware;
use Core\DB;
use PDO;

class ConnectionMiddleware extends Middleware
{

    public function process(App $app): bool
    {
        $app::$connect = DB::init($app->config);
        return $app::$connect instanceof PDO;
    }
}
