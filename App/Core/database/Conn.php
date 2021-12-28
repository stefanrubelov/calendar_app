<?php

namespace App\Core\database;

use PDO;
use PDOException;

class Conn
{
    /**
     * @var string $dbname
     */
    public $dbname = 'quantox_calendar';

    /**
     * @var string $dbuser
     */
    public $dbuser = 'root';

    /**
     * @var string $dbpassword
     */
    public $dbpassword = '';

    /**
     * @var object $pdo
     */
    public $pdo = '';

    /**
     * Connection constructor
     * Tries to establish connection tos the database
     */
    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:dbname=" . $this->dbname . ';host=localhost;', $this->dbuser, $this->dbpassword);
        } catch (PDOException $e) {
            echo 'Something went wrong! Try again later.';
            die();
        }
    }
}



// private static $instance = NULL;
// self::$instance = new PDO(
    //     "mysql:dbname=" . $this->dbname . ';host=localhost;',
    //     $this->dbuser,
    //     $this->dbpassword,
    //     [PDO::ERRMODE_EXCEPTION, PDO::PARAM_EVT_EXEC_POST]
// );