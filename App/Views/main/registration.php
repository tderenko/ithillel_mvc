<div class="col-6">
    <?php if ($message = \Core\App::$session->flashMessage()) : ?>
        <div class="alert alert-danger" role="alert">
           <?= $message ?>
        </div>
    <?php endif; ?>
    <form method="post" action="<?=\Core\Url::to('user/store')?>">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?= $_POST['name'] ?? '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="surname">Surname</label>
            <input type="text" name="surname" id="surname" value="<?= $_POST['surname'] ?? '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?= $_POST['email'] ?? '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="<?= $_POST['password'] ?? '' ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" name="age" id="age" value="<?= $_POST['age'] ?? '' ?>" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
