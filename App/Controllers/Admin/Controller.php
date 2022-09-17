<?php

namespace App\Controllers\Admin;

use Core\App;

class Controller extends BaseAdminController
{
    public function index()
    {
        App::$view->render('admin/index');
    }
}
