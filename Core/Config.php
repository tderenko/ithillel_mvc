<?php


namespace Core;


use Core\Traits\DotSlice;

class Config
{
    use DotSlice;
    protected static array $config = [];

    public function __construct(){
        if (!static::$config) {
            static::$config = require_once dirname(__DIR__) . "/Config/configs.php";
        }
    }

    public function getConfig(string $keys): string
    {
        return $this->getPiece($keys, static::$config);
    }
}
