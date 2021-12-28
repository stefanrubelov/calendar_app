<?php
// $router->define([
//////     '' => __DIR__ . '\..\App\Controllers\c\index.php',
//////     'login' => __DIR__ . '\..\App\Controllers\c\login.php',
//////     'register' => __DIR__ . '\..\App\Controllers\c\register.php',
//////     'calendar' => __DIR__ . '\..\App\Controllers\c\calendar.php',
//////     'logout' => __DIR__ . '\..\actions\user.logout.php',
//////     'add_event' => __DIR__ . '\..\actions\event.add.php',
//////     'update_event' => __DIR__ . '\..\actions\event.update.php',
//////     'delete_event' => __DIR__ . '\..\actions\event.delete.php',
//////     'calendar_events' => __DIR__ . '\..\actions\event.get.php'
// ]);

// $router->get('', __DIR__ . '\..\App\Controllers\c\index.php');

use App\Controllers\MainController;

$router->get('', [MainController::class, 'index']);
$router->get('login', __DIR__ . '\..\App\Controllers\c\login.php');
$router->get('register', __DIR__ . '\..\App\Controllers\c\register.php');
$router->get('calendar', __DIR__ . '\..\App\Controllers\c\calendar.php');
$router->get('calendar_events', __DIR__ . '\..\actions\event.get.php');



$router->post('logout', __DIR__ . '\..\actions\user.logout.php');
$router->post('add_event', __DIR__ . '\..\actions\event.add.php');
$router->post('update_event', __DIR__ . '\..\actions\event.update.php');
$router->post('delete_event', __DIR__ . '\..\actions\event.delete.php');
