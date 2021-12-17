<?php

use App\Auth;
use App\Router;

if (!Auth::check()) {
    Router::header('/login');
    die();
} else {
    dd(Auth::id());
}
?>

<div id="calendar" class="text-center">
    asdasdasd
</div>