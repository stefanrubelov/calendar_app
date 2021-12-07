<?php

use App\Auth;
use App\Router;

if (Auth::check()) {
    Router::header('/calendar');
}
?>
<a href="login" class="btn btn-outline-primary mx-auto" style="width: 6rem;">Login</a>
<a href="register" class="btn btn-outline-primary mx-auto" style="width: 6rem;">Register</a>