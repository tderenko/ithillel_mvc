<?php

namespace App\Controllers;

use App\Models\User;
use App\Validators\LoginValidator;
use Core\App;
use Core\Base\Controller;
use Core\Url;

class AuthController extends Controller
{
    public function before(string $action)
    {
        if (App::$user && $action !== 'logout') {
            Url::redirect();
        }
        parent::before($action);
    }

    public function login()
    {
        return App::$view->render('main/login');
    }

    public function registration()
    {
        return App::$view->render('main/registration');
    }

    public function auth()
    {
        $fields = filter_input_array(INPUT_POST, App::$request->getPostParams(), 1);
        $validator = new LoginValidator();
        if (!$validator->validate($fields)) {
            App::$session->setMessage(implode('<br />', $validator->getError()));
            Url::redirectBack();
        }

        if (!$user = User::findBy('email', $fields['login']) or !password_verify($fields['password'], $user->password)) {
            App::$session->setMessage("Login or password is incorrect!!!");
            Url::redirectBack();
        }

        App::$session->login($user);
        Url::redirect();
    }

    public function logout()
    {
        App::$session->logout();
        Url::redirect();
    }
}
