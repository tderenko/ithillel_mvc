<?php
/**
 * @var $model \App\Models\Category
 */
?>

<?php if ($message = \Core\App::$session->flashMessage()) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $message ?>
    </div>
<?php endif; ?>
<form method="post" action="<?=\Core\Url::to("admin/category/{$model->id}/update")?>" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name">Title</label>
        <input type="text" name="title" id="title" value="<?= $model->title ?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="description">Content</label>
        <textarea name="description" id="description" class="form-control" rows="10"><?= $model->description ?></textarea>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
