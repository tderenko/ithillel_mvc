<?php
/**
 * @var $model \App\Models\Category
 * @var $posts \App\Models\Post[]
 */
?>
<h1 class="text-center"><?= $model->title ?></h1>
<p><?= $model->description ?></p>
<div class="cards" style="display: flex; flex-wrap: wrap; align-content: center; justify-content: space-around; align-items: stretch;">
    <?php foreach ($posts as $post) : ?>
        <div class="card" style="width: 18rem;">
            <img src="<?= $post->thumbnail ?>" class="card-img-top" alt="<?= $post->title ?>" style="width: 286px; height: 286px; object-fit: cover; object-position: center">
            <div class="card-body">
                <h5 class="card-title"><?= $post->title ?></h5>
                <p class="card-text"><?= substr($post->content, 0, 100) . '...'?></p>
                <a href="<?= \Core\Url::to("category/{$model->id}/post/{$post->id}") ?>" class="btn btn-primary">More</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

