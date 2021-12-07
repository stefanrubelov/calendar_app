<?php

use App\Router;
use App\Session;

// require __DIR__ . '\..\autoload.php';

redirectIfNotPost('/calendar');
Session::destroy();
Router::header('/');
