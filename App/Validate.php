<?php

namespace App;

use App\Session;
use database\Conn;

class Validate extends Conn
{
    /**
     * Checks if given fields are empty
     * 
     * @return bool
     */
    public static function empty(): bool
    {
        $fields = func_get_args();
        foreach ($fields as $field) {
            if ((!isset($field) || trim($field) == '')) {
                Session::put('empty_fields_error', 'Please fill out all the fields.');
                return false;
            }
        }
        return true;
    }

    /**
     * Checks if given email is unique (from users table)
     * 
     * @return bool
     */
    public static function emailUnique($email): bool
    {
        $conn = new Conn();
        $result = $conn->pdo->query("SELECT * FROM users WHERE email='" . $email . "'");
        $result->execute();
        if ($result->rowCount() != 0) {
            Session::put('email_error', 'Email already in use.');
            return false;
        }
        return true;
    }

    /**
     * Checks if the given email is in the correct format
     * 
     * @return bool
     */
    public static function emailFormat($email): bool
    {
        $conn = new Conn();
        $result = $conn->pdo->query("SELECT * FROM users WHERE email='" . $email . "'");
        $result->execute();
        if ($result->rowCount() != 0) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                Session::put('email_error', 'Enter a valid email format');
                return false;
            }
            return true;
        }
    }
}
