<?php

namespace App\user;

use App\Router;
use App\Session;
use App\Validate;
use database\Conn;


class LoginUser extends Conn
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
        parent::__construct();
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
        if (Validate::empty($this->email, $this->password)) {
            $result = $this->pdo->query("SELECT * FROM users WHERE email='" . $this->email . "'");
            $result = $result->fetch();
            if ($result) {
                $password = $result['password'];
                $email = $result['email'];
                $id = $result['id'];
            } else {
                Session::put('login_error', 'Wrong credentials.');
                Router::header('/login');
            }
            if ($password == password_verify($this->password, $password) && $email == $this->email) {
                Session::put('user_id', "$id");
                Router::header('/calendar');
            } else {
                Session::put('login_error', 'Wrong credentials.');
                Router::header('/login');
            }
        } else {
            Router::header('/login');
        }
    }
}
