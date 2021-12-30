<?php

use App\Controllers\UserController;
use App\Controllers\LoginController;
use App\Controllers\CalendarController;
use App\Controllers\DashboardController;


$router->get('',            [DashboardController::class, 'index']);
$router->get('login',       [LoginController::class, 'index']);
$router->get('register',    [UserController::class, 'index']);
$router->get('calendar',    [CalendarController::class, 'index']);

$router->post('login', [LoginController::class, 'login']);
$router->post('logout', [LoginController::class, 'logout']);
$router->post('register', [UserController::class, 'saveUser']);
$router->post('add_event', [CalendarController::class, 'add']);
$router->post('update_event', [CalendarController::class, 'update']);
$router->post('delete_event', [CalendarController::class, 'delete']);
