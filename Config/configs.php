<?php
return [
    'db' => [
        'host' => getenv('DB_HOST') ?? '',
        'database' => getenv('DB_NAME') ?? '',
        'user' => getenv('DB_USER') ?? '',
        'password' => getenv('DB_PASSWORD') ?? '',
    ],
    'session' => [
        'hash' => getenv('SESSION_HASH') ?? ''
    ]
];
