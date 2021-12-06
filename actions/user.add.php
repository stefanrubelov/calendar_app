<?php

use App\Router;
use App\user\AddUser;

require '..\autoload.php';

checkIfPostRequest();

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$new_user = new AddUser($name, $email, $password);
$new_user->query();
Router::header('/login');
