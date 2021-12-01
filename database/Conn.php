<?php

namespace database;

use PDO;
use PDOException;

abstract class Conn
{
    public $que;
    private $dbname = 'quantox_calendar';
    private $host = 'localhost';
    private $dbuser = 'root';
    private $password = '';
    public $pdo = '';

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->dbuser, $this->password, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        } catch (PDOException $e) {
            echo 'Something went wrong! Try again later.';
            die();
        }
    }

    abstract protected function query($query);
}
