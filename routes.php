<?php
$router->define([
    'quantox_internship/calendar_app' => __DIR__ . '\App\controllers\index.php',
    'quantox_internship/calendar_app/login' => __DIR__ . '\App\controllers\login.php',
    'quantox_internship/calendar_app/register' => __DIR__ . '\App\controllers\register.php'
]);
