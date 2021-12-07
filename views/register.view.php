<?php

use App\Auth;
use App\Router;
use App\Session;

if (Auth::check()) {
    Router::header('/calendar');
}

$empty_fields_error = null;
$email_error = null;

if (Session::get('empty_fields_error')) {
    $empty_fields_error = Session::get('empty_fields_error');
}
if (Session::get('email_error')) {
    $email_error = Session::get('email_error');
}
Session::destroy();
?>

<form action="actions/user.add.php" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class=" mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <?php
    if ($empty_fields_error != '') { ?>
        <div class="alert alert-danger" role="alert">
            <?= $empty_fields_error ?>
        </div>
    <?php } ?>
    <?php
    if ($email_error != '') { ?>
        <div class="alert alert-danger" role="alert">
            <?= $email_error ?>
        </div>
    <?php } ?>
    <div class="mb-3 d-flex justify-content-between">
        <?php require __DIR__ . '/components/back-home.button.php' ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>