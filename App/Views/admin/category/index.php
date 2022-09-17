<?php
/**
 * @var $categories \App\Models\Category[]
 */
?>

<div class="table-exist">
    <div style="text-align: right; margin-bottom: 20px">
        <a href="<?= \Core\Url::to('admin/category')?>" class="btn btn-info">create category</a>
    </div>
    <table class="table table-striped">
        <tr class="table-dark">
            <th>#id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        <?php foreach ($categories as $item) : ?>
            <tr>
                <td><?= $item->id; ?></td>
                <td><?= $item->title ?></td>
                <td><?= substr($item->description, 0, 100) ?></td>
                <td>
                    <a href="<?= \Core\Url::to("admin/category/{$item->id}/edit") ?>" class="btn btn-info">Edit</a>
                    <a href="/?id=<?= $item->id ?>" class="btn btn-info">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
