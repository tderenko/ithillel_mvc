<?php
/**
 * @var $posts \App\Models\Post[]
 */
?>

<div class="table-exist">
    <div style="text-align: right; margin-bottom: 20px">
        <a href="<?= \Core\Url::to('admin/post')?>" class="btn btn-info">create post</a>
    </div>
    <table class="table table-striped">
        <tr class="table-dark">
            <th>#id</th>
            <th>Title</th>
            <th>Cateory</th>
            <th>Author</th>
            <th>Action</th>
        </tr>
        <?php foreach ($posts as $item) : ?>
            <tr>
                <td><?= $item->id; ?></td>
                <td><?= $item->title ?></td>
                <td><?= $item->category_id ?></td>
                <td><?= $item->author_id ?></td>
                <td>
                    <a href="<?= \Core\Url::to("admin/post/{$item->id}/edit") ?>" class="btn btn-info">Edit</a>
                    <a href="/?id=<?= $item->id ?>" class="btn btn-info">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
