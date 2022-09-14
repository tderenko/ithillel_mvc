<?php

namespace App\Models;

use Core\Base\Model;

class User extends Model
{
    public ?int $id = null;
    public string $name;
    public string $surname;
    public string $email;
    public string $age;
    public string $updated;
    public string $created;

    static function getTableName(): string
    {
        return 'users';
    }
}
