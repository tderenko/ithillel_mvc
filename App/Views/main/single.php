<?php
/**
 * @var $model \App\Models\Post
 * @var $author \App\Models\User
 * @var $category \App\Models\Category
 */
?>
<p><small><?= $category->title ?></small></p>
<h1><?= $model->title ?></h1>
<?php if ($model->thumbnail) : ?>
    <img src="<?= $model->thumbnail ?>" alt="<?= $model->title ?>" style="max-width: 400px; max-height: 400px;">
<?php endif; ?>
<p><?= $model->content ?></p>
<p style="text-align: right"><?= "{$author->name} {$author->surname}" ?></p>
