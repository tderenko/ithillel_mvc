<?php

namespace Core;

use App\Middleware\BaseMiddleware;
use App\Middleware\RouterMiddleware;

class App
{
    public static ?Request $request = null;
    public Controller $controller;
    public string $action;
    public array $params = [];

    public function __construct()
    {
       if (!static::$request) {
            self::$request = new Request();
       }
    }

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
        $middleware->linkWith(new RouterMiddleware());
        return $middleware->check($this);
    }
}
