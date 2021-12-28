<?php

use App\Controllers\LoginController;


// redirectIfNotPost();


$email = $_POST['email'];
$password = $_POST['password'];
$new_login = new LoginController($email, $password);
$new_login->query();
