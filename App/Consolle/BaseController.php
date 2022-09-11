<?php


namespace App\Consolle;


use Core\Config;
use Core\Traits\DotSlice;
use PDO;

abstract class BaseController
{
    public function __construct(
        public Config $config
    ){}

    public static function init(Config $config): static
    {
        return new static($config);
    }
}
