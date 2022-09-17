<?php

namespace Core\Exceptions;

use Core\Base\BaseException;

class ValidateRuleException extends BaseException
{
    public function __construct($message = "Rule not found!!!")
    {
        parent::__construct($message);
    }
}
