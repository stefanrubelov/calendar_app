<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Router;
use App\Core\Request;
use App\Core\Session;
use App\Core\Validate;
use App\Core\database\Conn;

class Controller
{
    public function __construct(
        protected Conn      $conn,
        protected Request   $request,
        protected Router    $router,
        protected Session   $session,
        protected Validate  $validate
    ) {
    }
}
