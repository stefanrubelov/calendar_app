<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Router;
use App\Core\Request;
use App\Core\Session;
use App\Core\Validate;
use App\Core\Helpers\Str;
use App\Core\database\Conn;
use App\Controllers\Controller;
use App\Core\database\Database;

class LoginController extends Controller
{
    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string password
     */
    private $password;

    /**
     * Class constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns the login view
     * 
     * @return void
     */
    public function index(): void
    {
        require_once 'views/login.view.php';
    }

    /**
     * Logs in the user
     * 
     * @return void
     */
    public function login(): void
    {
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];
        if ($this->validate->empty($this->email, $this->password)) {
            $user = $this->database->getUser($this->email);
            if ($user) {
                $password = $user['password'];
                $email = $user['email'];
                $id = $user['id'];
            } else {
                $this->session->put('error', 'Wrong credentials.');
                Router::header('/login');
            }
            if ($this->validate->passwordHash($this->password, $password) && $email == $this->email) {
                $this->session->put('user_id', $id);
                Router::header('/calendar');
            } else {
                $this->session->put('error', 'Wrong credentials.');
                Router::header('/login');
            }
        } else {
            Router::header('/login');
        }
    }

    /**
     * Logs out the user
     * 
     * @return void
     */
    public function logout(): void
    {
        Session::destroy();
        Router::header('/');
    }
}
