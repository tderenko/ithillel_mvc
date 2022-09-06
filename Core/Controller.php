<?php

namespace Core;

abstract class Controller
{
    public function before(string $action){}
    public function after(string $action){}
}
