<?php

use App\Auth;
use App\Router;
use App\Session;

if (Auth::check()) {
    Router::header('/calendar');
}

$empty_fields_error = null;
$email_error = null;
$login_error = null;
$register_success = null;

if (Session::get('empty_fields_error')) {
    $empty_fields_error = Session::get('empty_fields_error');
}
if (Session::get('email_error')) {
    $email_error = Session::get('email_error');
}
if (Session::get('login_error')) {
    $login_error = Session::get('login_error');
}
if (Session::get('register_success')) {
    $register_success = Session::get('register_success');
}
Session::destroy();

?>

<form action="actions/user.login.php" method="POST">
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <?php
    if ($empty_fields_error != null) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $empty_fields_error ?>
        </div>
    <?php } ?>
    <?php
    if ($email_error != null) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $email_error ?>
        </div>
    <?php } ?>
    <?php
    if ($login_error != null) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $login_error ?>
        </div>
    <?php } ?>
    <?php
    if ($register_success != null) { ?>
        <div class="alert alert-success" role="alert">
            <?= $register_success ?>
        </div>
    <?php } ?>
    <div class="mb-3 d-flex justify-content-between">
        <?php require __DIR__ . '/components/back-home.button.php' ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>