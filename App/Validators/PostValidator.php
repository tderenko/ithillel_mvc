<?php


namespace App\Validators;


use Core\Base\Validator;

class PostValidator extends Validator
{

    protected function rules(): array
    {
        return [
            'title' => [
                'text',
                fn($title) => strlen($title) > 3 && strlen($title) < 60
            ],
            'content' => 'text',
            'author_id' => 'number',
            'category_id' => 'number',
        ];
    }
}