<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Validators\CategoryValidator;
use Core\App;
use Core\Url;

class CategoryController extends BaseAdminController
{
    public function index()
    {
        return App::$view->render('admin/category/index', [
            'categories' => Category::all()
        ]);
    }

    public function create()
    {
        return App::$view->render('admin/category/create');
    }

    public function store()
    {
        $validator = new CategoryValidator();
        $fields = filter_input_array(INPUT_POST, App::$request->getPostParams(), 1);
        if (!$validator->validate($fields)) {
            App::$session->setMessage(implode('<br />', $validator->getError()));
            Url::redirectBack();
        }
        Category::create($fields);
        Url::redirect('admin/categories');
    }

    public function edit(int $id)
    {
        if (!$model = Category::find($id)) {
            throw new \Exception('Category not found', 404);
        }
        return App::$view->render('admin/category/edit', compact('model'));
    }

    public function update(int $id)
    {
        if (!$model = Category::find($id)) {
            throw new \Exception('Category not found!!!', 404);
        }
        $validator = new CategoryValidator();
        $fields = filter_input_array(INPUT_POST, App::$request->getPostParams(), 1);
        if (!$validator->validate($fields)) {
            App::$session->setMessage(implode('<br />', $validator->getError()));
            Url::redirectBack();
        }
        $model->update($fields)->get();
        Url::redirect('admin/categories');
    }
}
