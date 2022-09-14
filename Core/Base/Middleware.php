<?php

namespace Core\Base;

use Core\App;

abstract class Middleware
{
    protected ?Middleware $next = null;

    public function linkWith(Middleware $next): Middleware
    {
        return $this->next = $next;
    }

    abstract public function process(App $app): bool;

    public function check(App $app): bool
    {
        $this->process($app) || die;
        return !$this->next || $this->next->check($app);
    }
}
