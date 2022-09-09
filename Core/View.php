<?php


namespace Core;


class View
{
    public $title;
    public $description;

    public $layout = 'main';

    public function render(string $template, array $data)
    {
        ob_start();
        $this->renderPart($template, $data);
        $content = ob_get_clean();
        $path = VIEW_DIR . "layouts/{$this->layout}.php";
        if (!is_readable($path)) {
            throw new \Exception("Layout \"{$path}\" doesn't exists!!!");
        }
        return require_once $path;
    }

    public function renderPart(string $template, array $data)
    {
        $path = VIEW_DIR . "{$template}.php";
        if (!is_readable($path)) {
            throw new \Exception("Template \"{$path}\" doesn't exists!!!");
        }
        extract($data);
        require_once $path;
    }
}
