<?php

namespace Core;

use App\Middleware\AuthMiddleware;
use App\Middleware\BaseMiddleware;
use App\Middleware\ConnectionMiddleware;
use App\Middleware\RouterMiddleware;
use App\Models\User;
use Core\Base\Controller;

class App
{
    public static Request $request;
    public static \PDO $connect;
    public static View $view;
    public static ?User $user;
    public static Session $session;
    public static self $app;

    public Controller $controller;
    public string $action;
    public array $params = [];

    public function __construct(
        public Config $config
    ){}

    public function run()
    {
        try {
            if ($this->middleware()) {
                $this->controller->before($this->action);
                call_user_func_array([$this->controller, $this->action], $this->params);
                $this->controller->after($this->action);
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }

    protected function middleware(): bool
    {
        $middleware = new BaseMiddleware();
        $middleware
            ->linkWith(new ConnectionMiddleware())
            ->linkWith(new RouterMiddleware())
            ->linkWith(new AuthMiddleware());
        return $middleware->check($this);
    }

    public function getConfig(string $keys)
    {
        return $this->config->getConfig($keys);
    }
}
