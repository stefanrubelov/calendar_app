<?php

use App\Core\Router;
use App\Core\Session;


// redirectIfNotPost('/calendar');
Session::destroy();
Router::header('/');
