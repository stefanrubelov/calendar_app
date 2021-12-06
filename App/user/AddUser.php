<?php

namespace App\user;

use App\Router;
use App\Validator;
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
     * 
     * @return void
     */
    public function query($query = 'INSERT INTO users (name, email, password) values(:name, :email, :password)'): void
    {
        if (Validator::empty($this->name, $this->email, $this->password) && Validator::emailUnique($this->email)) {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute(
                [
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => password_hash($this->password, PASSWORD_DEFAULT)
                ]
            );
        } else {
            Router::header('/register');
        }
    }
}
