<?php


namespace App\Consolle;


use Core\Migration;
use Core\Traits\DotSlice;
use PDO;

class ConsoleController extends BaseController
{
    public function index()
    {
        printf(" | \033[1;31m%-20s\033[0m | \n", "List of actions");
        printf(" | \033[0;32m%20s\033[0m | \n", "migrate");
        echo PHP_EOL;
    }

    public function migrate()
    {
        Migration::run();
    }
}
