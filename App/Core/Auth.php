<?php

namespace App\Core;

use App\Core\Session;
use App\Core\database\Conn;
use App\Core\database\Database;

class Auth
{
    public function __construct()
    {
        $this->session = new Session();
        $this->database = new Database();
    }

    /**
     * Check if user_id is set in session (if user is logged in)
     * 
     * @return bool
     */
    public static function check(): bool
    {
        if (Session::get('user_id')) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * returns logged users id
     * 
     * @return string|int
     */
    public static function id(): int
    {
        return Session::get('user_id');
    }

    /**
     * returns logged users name
     * 
     */
    public static function name()
    {
        // $conn = new Conn;
        $database = new Database();
        $id = Session::get('user_id');
        if ($id) {
            $name = $database->getColumn('users', 'name')[0];
            return $name;
        } else {
            return 'Unknown';
        }
    }
}
