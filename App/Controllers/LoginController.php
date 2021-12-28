<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Router;
use App\Core\Request;
use App\Core\Session;
use App\Core\Validate;
use App\Core\database\Conn;
use App\Controllers\Controller;

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
     * LoginUser constructor
     * @param string $this->email
     * @param string $this->password
     */
    public function __construct($email, $password)
    {
        parent::__construct(new Conn(), new Request(), new Router(), new Session(), new Validate());
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Logs in the user
     * 
     * @return void
     */
    public function query(): void
    {
        if ($this->validate->empty($this->email, $this->password)) {
            $result = $this->conn->pdo->query("SELECT * FROM users WHERE email='" . $this->email . "'");
            $result = $result->fetch();
            if ($result) {
                $password = $result['password'];
                $email = $result['email'];
                $id = $result['id'];
            } else {
                Session::put('error', 'Wrong credentials.');
                Router::header('/login');
            }
            if ($password == password_verify($this->password, $password) && $email == $this->email) {
                Session::put('user_id', $id);
                Router::header('/calendar');
            } else {
                Session::put('error', 'Wrong credentials.');
                Router::header('/login');
            }
        } else {
            Router::header('/login');
        }
    }
}
