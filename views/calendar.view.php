<?php

use App\Core\Auth;
use App\Core\Router;

if (!Auth::check()) {
    Router::header('/login');
    die();
} else {
    Auth::id();
}
?>

<div id="calendar" class="text-center">
    asdasdasd
</div>