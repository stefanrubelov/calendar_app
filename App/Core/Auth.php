<?php

namespace App\Core;

use App\Core\database\Conn;
use App\Controllers\Controller;

class Auth extends Controller
{
    public function __construct()
    {
        parent::__construct(new Conn(), new Request(), new Router(), new Session(), new Validate());
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
        $conn = new Conn;
        $id = Session::get('user_id');
        if ($id) {
            $result = $conn->pdo->query("SELECT name FROM users WHERE id='" . $id . "'");
            $name = $result->fetch()['name'];
            return $name;
        } else {
            return 'Unknown';
        }
    }
}
