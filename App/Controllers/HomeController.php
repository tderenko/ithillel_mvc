<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Core\App;
use Core\Base\Controller;

class HomeController extends Controller
{
    public function index()
    {
       return App::$view->render('main/index');
    }

    public function category(int $id)
    {
        if (!$model = Category::find($id)) {
            throw new \Exception('Category not found!!!', 404);
        }

        return App::$view->render('main/category', [
            'model' => $model,
            'posts' => Post::select()->where(['category_id' => $id])->get()
        ]);
    }

    public function post(int $catId, int $postId)
    {
        if (!$model = Post::find($postId)) {
            throw new \Exception('Post not found!!!', 404);
        }

        return App::$view->render('main/single', [
            'model' => $model,
            'author' => User::find($model->author_id),
            'category' => Category::find($catId)
        ]);
    }
}
