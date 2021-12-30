<?php

namespace App\Controllers;

use App\Core\Router;
use App\Core\Request;
use App\Core\Session;
use App\Core\Validate;
use App\Core\database\Database;

class Controller
{
    public function __construct()
    {
        $this->database = new Database();
        $this->request = new Request();
        $this->router = new Router();
        $this->session = new Session();
        $this->validate = new Validate();
    }
}
