<?php

namespace database;

use PDO;
use PDOException;

class Conn
{
    public $que;
    public $dbname = 'quantox_calendar';
    public $dbuser = 'root';
    public $dbpassword = '';
    public $pdo = '';

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:dbname=" . $this->dbname . ';host=localhost;', $this->dbuser, $this->dbpassword);
        } catch (PDOException $e) {
            echo 'Something went wrong! Try again later.';
            die();
        }
    }

    // abstract protected function query($query);
}

// new PDO(
//     "mysql:dbname={$_ENV['DB_NAME']};host={$_ENV['DB_HOST']}",
//     "{$_ENV['DB_USER']}",
//     "{$_ENV['DB_PASSWORD']}",
//     [PDO::ERRMODE_EXCEPTION]
// );
