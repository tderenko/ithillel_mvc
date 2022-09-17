<?php

require_once __DIR__ . '/vendor/autoload.php';

\Dotenv\Dotenv::createUnsafeImmutable(__DIR__)->load();

$params = array_slice($argv, 2);
[$method, $action] = $argv[1] ? array_pad(explode(':', $argv[1]), 2, null) : ['index', null];


$config = new \Core\Config();
\Core\DB::init($config);
$controller = \App\Consolle\ConsoleController::init($config);

if (!method_exists($controller, $method)) {
    throw new \Core\Exceptions\ConsoleActionException();
}

$controller->$method($action, ...$params);

die('done' . PHP_EOL);
