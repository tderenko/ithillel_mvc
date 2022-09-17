<?php

namespace Core;

class Url
{
    public static function to(string $url = ''): string
    {
        return App::$request->getHostUrl() . "/$url";
    }

    public static function redirect(string $url = ''): void
    {
        header('Location: ' . App::$request->getHostUrl() . "/$url");
        die;
    }

    public static function redirectBack(): void
    {
        header('Location: ' . (App::$request->getReferer() ?: App::$request->getHostUrl()));
        die;
    }
}
