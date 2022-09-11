<?php
/**
 * @var $users \App\Models\User[]
 */
?>

<div class="table-exist">
    <form method="post">
        <table class="table table-striped">
            <tr class="table-dark">
                <th>#id</th>
                <th>Name</th>
                <th>Surname</th>
                <th>Age</th>
                <th>Email</th>
                <th>Action</th>
                <th>Remove</th>
            </tr>
            <tr class="table-info">
                <td>#</td>
                <td>
                    <input type="text" name="name" class="form-control" value="<?= $_POST['name'] ?? ''?>">
                </td>
                <td>
                    <input type="text" name="surname" class="form-control" value="<?= $_POST['surname'] ?? ''?>">
                </td>
                <td>
                    <input type="text" name="age" class="form-control" value="<?= $_POST['birthday'] ?? ''?>">
                </td>
                <td>
                    <input type="text" name="email" class="form-control" value="<?= $_POST['email'] ?? ''?>">
                </td>
                <td>
                    <button type="submit" name="action" value="add user" class="btn btn-success">Add</button>
                </td>
                <td></td>
            </tr>

            <?php
            foreach ($users as $item) : ?>
                <tr>
                    <td><?= $item->id; ?></td>
                    <td><?= $item->name ?></td>
                    <td><?= $item->surname ?></td>
                    <td><?= $item->birthday ?></td>
                    <td><?= $item->email ?></td>
                    <td>
                        <a href="/?id=<?= $item->id ?>" class="btn btn-info">Info</a>
                    </td>
                    <td>
                        <input type="checkbox" name="delete[]" class="form-check-input" value="<?= $item->id ?>">
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="6"></td>
                <td>
                    <button type="submit" name="action" value="remove users" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        </table>
    </form>
</div>
