<?php
/**
 * @var $router \Core\Router
 */

$router->add('admin/posts/{id:\d+}/edit',
    [
        'controller' => \App\Controllers\HomeController::class,
        'action' => 'edit',
        'method' => 'GET'
    ]
);

$router->add('admin/{type:\w+}/{id:\d+}/show',
    [
        'controller' => \App\Controllers\HomeController::class,
        'action' => 'show',
        'method' => 'GET'
    ]
);

$router->add('',
    [
        'controller' => \App\Controllers\HomeController::class,
        'action' => 'index',
        'method' => 'GET'
    ]
);
