<?php
/**
 * @var $model \App\Models\Post
 * @var $authors \App\Models\User[]
 * @var $categories \App\Models\Category[]
 */
?>

<?php if ($message = \Core\App::$session->flashMessage()) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $message ?>
    </div>
<?php endif; ?>
<form method="post" action="<?=\Core\Url::to("admin/post/{$model->id}/update")?>" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Title</label>
        <input type="text" name="title" id="title" value="<?= $model->title ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-control">
            <option>Category</option>
            <?php foreach ($categories as $category) :?>
                <option value="<?=$category->id?>" <?= $category->id === $model->category_id ? 'checked="checked"' : ''?>><?= $category->title ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control" rows="10"><?= $model->content ?></textarea>
    </div>
    <div class="form-group">
        <label for="author_id">Author</label>
        <select name="author_id" id="author_id" class="form-control">
            <option>Author</option>
            <?php foreach ($authors as $author) :?>
                <option value="<?=$author->id?>" <?= $author->id === $model->author_id ? 'checked="checked"' : ''?>><?="{$author->name} {$author->surname} "?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <?php if ($model->thumbnail) :?>
        <img src="<?=$model->thumbnail?>" style="max-width: 400px">
    <?php endif; ?>
    <div class="form-group">
        <label for="thumbnail">Image</label>
        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
