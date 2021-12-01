<?php

require_once __DIR__ . '\autoload.php';

use App\Router;

$router = new Router();

require 'routes.php';


$uri = trim($_SERVER['REQUEST_URI'], '/');
// dd($uri);
dd(require $router->redirect($uri));
