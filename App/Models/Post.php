<?php

namespace App\Models;

use Core\Base\Model;

class Post extends Model
{
    public ?int $id = null;
    public ?int $category_id;
    public string $title;
    public string $content;
    public int $author_id;
    public ?string $thumbnail;
    public string $updated;
    public string $created;

    public static function getTableName(): string
    {
        return 'posts';
    }
}
