<?php

use App\user\AddUser;

require '..\autoload.php';

redirectIfNotPost();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$new_user = new AddUser($name, $email, $password);
$new_user->query();
