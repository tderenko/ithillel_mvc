<?php

namespace App\Controllers\Admin;

use App\Models\User;
use App\Validators\RegisterValidator;
use Core\App;
use Core\Url;

class UserController extends BaseAdminController
{
    public function index()
    {
        return App::$view->render('admin/user/index', [
            'users' => User::all()
        ]);
    }

    public function show(int $id)
    {

    }

    public function create()
    {
        return App::$view->render('user/create');
    }

    public function store()
    {
        $fields = filter_input_array(INPUT_POST, App::$request->getPostParams(), 1);
        $validator = new RegisterValidator();
        if ($validator->validate($fields)) {
            $fields['password'] = password_hash($fields['password'], PASSWORD_BCRYPT);
            if ($user = User::create($fields)) {
                App::$session->login($user);
                Url::redirect();
            }
        }
        App::$session->setMessage(implode('<br />', $validator->getError()));
        Url::redirectBack();
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function delete(int $id)
    {

    }
}
