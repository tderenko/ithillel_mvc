<?php
/**
 * @var $users \App\Models\User[]
 */
?>

<div class="table-exist">
    <table class="table table-striped">
        <tr class="table-dark">
            <th>#id</th>
            <th>Name</th>
            <th>Surname</th>
            <th>Age</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach ($users as $item) : ?>
            <tr>
                <td><?= $item->id; ?></td>
                <td><?= $item->name ?></td>
                <td><?= $item->surname ?></td>
                <td><?= $item->age ?></td>
                <td><?= $item->email ?></td>
                <td>
                    <a href="/?id=<?= $item->id ?>" class="btn btn-info">Edit</a>
                    <a href="/?id=<?= $item->id ?>" class="btn btn-info">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
