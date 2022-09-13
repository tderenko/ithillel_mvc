<?php
?>
<form action="/user/store" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="" class="form-control">
    </div>
    <div class="form-group">
        <label for="surname">Surname</label>
        <input type="text" name="surname" id="surname" value="" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="" class="form-control">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" value="" class="form-control">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" name="age" id="age" value="" class="form-control">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
