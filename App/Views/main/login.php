<div class="col-6">
    <?php if ($message = \Core\App::$session->flashMessage()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $message ?>
        </div>
    <?php endif; ?>
    <form method="post" action="<?= \Core\Url::to('user/auth')?>">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
