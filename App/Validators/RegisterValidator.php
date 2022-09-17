<?php


namespace App\Validators;


use App\Models\User;
use Core\Base\Validator;

class RegisterValidator extends Validator
{

    protected function rules(): array
    {
        return [
            'name' => 'text',
            'surname' => 'text',
            'email' => fn($email) => preg_match('/^[\w\-]+@[\w\-.]+\.[a-z]+$/', $email) && !User::findBy('email', $email),
            'password' => fn($password) => preg_match('/^\w{4,16}/', $password),
            'age' => 'number'
        ];
    }
}
