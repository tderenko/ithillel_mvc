<?php

namespace App\Models;

use Core\Base\Model;

class Category extends Model
{
    public ?int $id;
    public string $title;
    public string $description;

    public static function getTableName(): string
    {
        return 'categories';
    }
}
