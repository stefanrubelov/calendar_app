<?php

use App\Core\Auth;
use App\Core\Router;
use App\Core\Session;

if (Auth::check()) {
    Router::header('/calendar');
}

$session_error_message = null;
$session_success_message = null;

if (Session::get('error')) {
    $session_error_message = Session::get('error');
}
if (Session::get('success')) {
    $session_success_message = Session::get('success');
}
Session::destroy();

?>

<form action="register" method="POST">
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
    if ($session_error_message != null) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $session_error_message ?>
        </div>
    <?php } ?>
    <?php
    if ($session_success_message != null) { ?>
        <div class="alert alert-success" role="alert">
            <?= $session_success_message ?>
        </div>
    <?php } ?>
    <div class="mb-3 d-flex justify-content-between">
        <?php require __DIR__ . '/components/back-home.button.php' ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>