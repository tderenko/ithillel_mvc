<?php

namespace Core\Base;

use Core\Traits\DbRequests;

abstract class Model
{
    use DbRequests;
    abstract public static function getTableName(): string;

    public function before(){}
    public function after(){}
}
