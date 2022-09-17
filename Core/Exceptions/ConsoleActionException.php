<?php

namespace Core\Exceptions;

use Core\Base\BaseException;

class ConsoleActionException extends BaseException
{
    public function __construct($message = "Action not Found!!!")
    {
        parent::__construct($message, 400);
    }
}
