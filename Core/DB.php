<?php

namespace Core;

use PDO;

class DB
{
    static public ?PDO $connect = null;

    public static function init(Config $config): PDO
    {
        if (!static::$connect instanceof PDO) {
            static::$connect = new PDO(
                "mysql:host={$config->getConfig('db.host')};dbname={$config->getConfig('db.database')}",
                $config->getConfig('db.user'),
                $config->getConfig('db.password'),
                [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]
            );
        }
        return static::$connect;
    }
}
