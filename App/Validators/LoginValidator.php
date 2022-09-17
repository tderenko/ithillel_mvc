<?php

namespace App\Validators;

use Core\Base\Validator;

class LoginValidator extends Validator
{

    protected function rules(): array
    {
        return [
            'login' => 'email',
            'password' => 'text'
        ];
    }
}
