<?php

namespace App\Validators;

use Core\Base\Validator;

class CategoryValidator extends Validator
{

    protected function rules(): array
    {
        return [
            'title' => [
                'text',
                fn($title) => strlen($title) > 2 && strlen($title) < 50
            ],
            'description' => 'text'
        ];
    }
}
