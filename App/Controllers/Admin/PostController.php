<?php

namespace App\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Validators\PostValidator;
use Core\App;
use Core\Url;

class PostController extends BaseAdminController
{
    public function index()
    {
        return App::$view->render('admin/post/index', [
            'posts' => Post::all()
        ]);
    }

    public function create()
    {
        return App::$view->render('admin/post/create', [
            'authors' => User::all(),
            'categories' => Category::all()
        ]);
    }

    public function edit(int $id) {
        if (!$model = Post::find($id)) {
            throw new \Exception('Page not found!!!', 404);
        }
        return App::$view->render('admin/post/edit', [
            'model' => $model,
            'authors' => User::all(),
            'categories' => Category::all()
        ]);
    }

    public function update(int $id)
    {
        if (!$model = Post::find($id)) {
            throw new \Exception('Post not found!!!', 404);
        }
        $validator = new PostValidator();
        $fields = filter_input_array(INPUT_POST, App::$request->getPostParams(), 1);
        if (!$validator->validate($fields)) {
            App::$session->setMessage(implode('<br />', $validator->getError()));
            Url::redirectBack();
        }

        if (isset($_FILES['thumbnail'])) {
            if (!file_exists(PUBLIC_DIR . '/images')) {
                mkdir(PUBLIC_DIR . '/images', 0777);
            }
            $path = '/images/' . basename($_FILES['thumbnail']['name']);
            if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], PUBLIC_DIR . $path)) {
                $fields['thumbnail'] = $path;
            }
        }
        $model->update($fields)->get();
        Url::redirect('admin/posts');
    }

    public function store()
    {
        $validator = new PostValidator();
        $fields = filter_input_array(INPUT_POST, App::$request->getPostParams(), 1);
        if (!$validator->validate($fields)) {
            App::$session->setMessage(implode('<br />', $validator->getError()));
            Url::redirectBack();
        }

        if (isset($_FILES['thumbnail'])) {
            if (!file_exists(PUBLIC_DIR . '/images')) {
                mkdir(PUBLIC_DIR . '/images', 0777);
            }
            $path = '/images/' . basename($_FILES['thumbnail']['name']);
            if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], PUBLIC_DIR . $path)) {
                $fields['thumbnail'] = $path;
            }
        }
        Post::create($fields);
        Url::redirect('admin/posts');
    }
}
