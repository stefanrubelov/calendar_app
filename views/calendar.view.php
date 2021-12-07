<?php

use App\Auth;
use App\Router;

if (!Auth::check()) {
    Router::header('/login');
} else {
    echo Auth::id();
}
?>

<form action="logout" method="post">
    <button type="submit" class="btn btn-outline-primary">Logout</button>
</form>