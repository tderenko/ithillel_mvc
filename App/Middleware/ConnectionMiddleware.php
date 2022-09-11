<?php


namespace App\Middleware;


use Core\App;
use Core\Middleware;
use PDO;

class ConnectionMiddleware extends Middleware
{

    public function process(App $app): bool
    {
        $app::$connect = new PDO(
            "mysql:host={$app->getConfig('db.host')};dbname={$app->getConfig('db.database')}",
            $app->getConfig('db.user'),
            $app->getConfig('db.password'),
            [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
        return $app::$connect instanceof PDO;
    }
}
