<?php

namespace App;

use database\Conn;

class Auth
{
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
     * @return string
     */
    public static function name(): string
    {
        $conn = new Conn;
        $id = new Auth;
        $id = $id->id();
        if ($id) {
            $result = $conn->pdo->query("SELECT name FROM users WHERE id='" . $id . "'");
            $name = $result->fetch()['name'];
            return $name;
        } else {
            return 'unknown';
        }
    }
}
