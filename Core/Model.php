<?php

namespace Core;

use Core\Traits\DbRequests;

abstract class Model
{
    use DbRequests;
    abstract static function getTableName(): string;
}
