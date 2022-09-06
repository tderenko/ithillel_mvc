<?php


namespace App\Controllers;


use Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        dd("Home Page");
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
