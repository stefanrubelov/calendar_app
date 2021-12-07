<?php
$router->define([
    '' => __DIR__ . '\..\App\controllers\index.php',
    'login' => __DIR__ . '\..\App\controllers\login.php',
    'register' => __DIR__ . '\..\App\controllers\register.php',
    'calendar' => __DIR__ . '\..\App\controllers\calendar.php',
    'logout' => __DIR__ . '\..\actions\user.logout.php'
]);
