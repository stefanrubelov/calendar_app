<?php

use App\user\LoginUser;

require '..\autoload.php';

redirectIfNotPost();

$email = $_POST['email'];
$password = $_POST['password'];
$new_login = new LoginUser($email, $password);
$new_login->query();
