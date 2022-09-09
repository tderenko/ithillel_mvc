<?php


namespace App\Controllers;


use App\Models\User;
use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        d(User::delete()->where(['email' => 'jony@yellow.com'])->get());

        d(
            '1 //static all() - виводить усі записи з таблиці',
            User::all()
        );
        d(
            '2 //static find(int $id) - знаходить запис з id',
            User::find(3)
        );
        d(
            '3 //static findBy($column, $value) - знаходить запис за значенням',
            User::findBy('email', 'robin@green.com')
        );
        d(
            '4 //static create($fields) - створює запис та повертає її id',
            $user = User::create([
            'name' => 'Jony',
            'surname' => 'Yellow',
            'email' => 'jony@yellow.com',
            'age' => 32
            ])
        );
        d(
            '5 //update($fields) - оновлює поточний запис переданими полями (не статик функція!!)',
            $user->update(['surname' => 'White'])->get()
        );
        d($user);
        d(
            '6 //static delete($id) - видаляє запис з id',
            User::delete($user->id)
        );
        d($user);
        d(
            '7 //static select() - готує запит для where',
            '8 //where(array ["column", "<", "value"]) - WHERE блок (не статик функція!!)',
            '9 //get() - кінцевий не статік метод, який викликається для отримання результату',
            User::select()
                ->where(['name' => 'Robin', ['email', 'like', '%ivia%']], 'OR')
                ->get()
        );
    }

    public function edit(int $id)
    {
        dd("Edit Page!!! ID: $id");
    }

    public function show(string $type, int $id)
    {
        dd("Show Page!!! Type: $type, ID: $id");
    }
}
