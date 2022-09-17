<?php

namespace App\Controllers\Admin;

use Core\App;

class BaseAdminController extends \Core\Base\Controller
{
    public function before(string $action)
    {
        if (!App::$user) {
            throw new \Exception('Forbidden error', 403);
        }
        App::$view->layout = 'admin';
        parent::before($action);
    }
}
