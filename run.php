<?php

require_once __DIR__ . '/vendor/autoload.php';

\Dotenv\Dotenv::createUnsafeImmutable(__DIR__)->load();

$action = $argv[1] ?? 'index';

$config = new \Core\Config();
\Core\DB::init($config);
$controller = \App\Consolle\ConsoleController::init($config);

if (!method_exists($controller, $action)) {
    throw new \Core\Exceptions\ConsoleActionException();
}

$controller->$action();

die('done' . PHP_EOL);
