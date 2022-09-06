<?php

require_once dirname(__DIR__) . '/Config/constants.php';
require_once BASE_DIR . '/vendor/autoload.php';

\Dotenv\Dotenv::createImmutable(dirname(__DIR__))->load();

$configs = require_once BASE_DIR . '/Config/configs.php';

(new \Core\App($configs))->run();
