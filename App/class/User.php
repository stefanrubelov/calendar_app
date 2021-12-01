<?php

namespace App\class;

use database\Conn;


class User extends Conn
{
    private $name;
    private $email;
    private $password;

    public function __construct($name, $email, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function query($query)
    {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(
            [
                'name' => $this->name,
                'email' => $this->email,
                'password' => password_hash($this->password, PASSWORD_DEFAULT)
            ]
        );
    }
}
