<?php

namespace App\user;

use App\Router;
use App\Session;
use App\Validate;
use database\Conn;


class AddUser extends Conn
{
    /**
     *@var string $name 
     */
    private $name;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string $password
     */
    private $password;


    /**
     * AddUser constructor
     * @param string $this->name
     * @param string $this->email 
     * @param string $this->password 
     */
    public function __construct($name, $email, $password)
    {
        parent::__construct();
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Saves new user to database
     * @param string $query
     * 
     * @return void
     */
    public function query($query = 'INSERT INTO users (name, email, password) values(:name, :email, :password)'): void
    {
        if (Validate::empty($this->name, $this->email, $this->password) && Validate::emailUnique($this->email)) {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                [
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => password_hash($this->password, PASSWORD_DEFAULT)
                ]
            );
            Session::put('register_success', 'You registered successfully, you can log in now.');
            Router::header('/login');
            return;
        } else {
            Router::header('/register');
            return;
        }
    }
}
