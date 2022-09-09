<?php

namespace Core;

use App\Middleware\BaseMiddleware;
use App\Middleware\ConnectionMiddleware;
use App\Middleware\RouterMiddleware;
use Core\Traits\DotSlice;

class App
{
    use DotSlice;

    public static Request $request;
    public static \PDO $connect;
    public static self $app;
    public static View $view;
    public Controller $controller;
    public string $action;
    public array $params = [];

    public function __construct(
        protected array $config
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
            ->linkWith(new RouterMiddleware())
            ->linkWith(new ConnectionMiddleware());
        return $middleware->check($this);
    }

    public function getConfig(string $keys)
    {
        return $this->getPiece($keys, $this->config);
    }
}
