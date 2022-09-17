<?php
/**
 * @var $router \Core\Router
 */

$router->add('', ['controller' => \App\Controllers\HomeController::class, 'action' => 'index', 'method' => 'GET']);
$router->add('login', ['controller' => \App\Controllers\AuthController::class, 'action' => 'login', 'method' => 'GET']);
$router->add('user/auth', ['controller' => \App\Controllers\AuthController::class, 'action' => 'auth', 'method' => 'POST']);
$router->add('registration', ['controller' => \App\Controllers\AuthController::class, 'action' => 'registration', 'method' => 'GET']);
$router->add('user/store', ['controller' => \App\Controllers\Admin\UserController::class, 'action' => 'store', 'method' => 'POST']);
$router->add('logout', ['controller' => \App\Controllers\AuthController::class, 'action' => 'logout', 'method' => 'GET']);

$router->add('category/{catId:\d+}/post/{postId:\d+}', ['controller' => \App\Controllers\HomeController::class, 'action' => 'post', 'method' => 'GET']);
$router->add('category/{id:\d+}', ['controller' => \App\Controllers\HomeController::class, 'action' => 'category', 'method' => 'GET']);

$router->add('admin', ['controller' => \App\Controllers\Admin\Controller::class, 'action' => 'index', 'method' => 'GET']);

/* Posts */
$router->add('admin/posts', ['controller' => \App\Controllers\Admin\PostController::class, 'action' => 'index', 'method' => 'GET']);
$router->add('admin/post', ['controller' => \App\Controllers\Admin\PostController::class, 'action' => 'create', 'method' => 'GET']);
$router->add('admin/post/store', ['controller' => \App\Controllers\Admin\PostController::class, 'action' => 'store', 'method' => 'POST']);
$router->add('admin/post/{id:\d+}/edit', ['controller' => \App\Controllers\Admin\PostController::class, 'action' => 'edit', 'method' => 'GET']);
$router->add('admin/post/{id:\d+}/update', ['controller' => \App\Controllers\Admin\PostController::class, 'action' => 'update', 'method' => 'POST']);

/* Caregory */
$router->add('admin/categories', ['controller' => \App\Controllers\Admin\CategoryController::class, 'action' => 'index', 'method' => 'GET']);
$router->add('admin/category', ['controller' => \App\Controllers\Admin\CategoryController::class, 'action' => 'create', 'method' => 'GET']);
$router->add('admin/category/store', ['controller' => \App\Controllers\Admin\CategoryController::class, 'action' => 'store', 'method' => 'POST']);
$router->add('admin/category/{id:\d+}/edit', ['controller' => \App\Controllers\Admin\CategoryController::class, 'action' => 'edit', 'method' => 'GET']);
$router->add('admin/category/{id:\d+}/update', ['controller' => \App\Controllers\Admin\CategoryController::class, 'action' => 'update', 'method' => 'POST']);

$router->add('admin/users', ['controller' => \App\Controllers\Admin\UserController::class, 'action' => 'index', 'method' => 'GET']);
