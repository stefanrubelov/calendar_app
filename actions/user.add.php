<?php

use App\Controllers\UserController;


redirectIfNotPost();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$new_user = new UserController($name, $email, $password);
$new_user->query();
