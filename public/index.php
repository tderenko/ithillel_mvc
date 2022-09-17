<?php

require_once dirname(__DIR__) . '/Config/constants.php';
require_once BASE_DIR . '/vendor/autoload.php';

\Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR)->load();

(new \Core\App(new \Core\Config()))->run();
