<?php

namespace App\Controllers;

use App\Models\User;
use Core\App;
use Core\Controller;

class UserController extends Controller
{
    public function index()
    {
        return App::$view->render('user/index', [
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