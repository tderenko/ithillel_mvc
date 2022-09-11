<?php


namespace App\Consolle;


use Core\Migration;
use Core\Traits\DotSlice;
use PDO;

class ConsoleController extends BaseController
{
    public function index()
    {
        echo 'hello', PHP_EOL;
    }

    public function migrate()
    {
        Migration::run();
    }
}
