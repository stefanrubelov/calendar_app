<?php

namespace App\Core;

use App\Controllers\Controller;
use App\Core\Session;
use App\Core\database\Conn;
use App\Core\database\Database;

/**
 * Validator class to validate given inputs
 */
class Validate
{
    public function __construct()
    {
        $this->session = new Session();
        $this->database = new Database();
    }
    /**
     * Checks if given fields are empty
     * 
     * @return bool
     */
    public function empty(): bool
    {
        $fields = func_get_args();
        foreach ($fields as $field) {
            if ((!isset($field) || trim($field) == '')) {
                $this->session->put('error', 'Please fill out all the fields.');
                return false;
            }
        }
        return true;
    }

    /**
     * Checks if given email is unique (from users table)
     * @param string $email Email address to be validated
     * 
     * @return bool
     */
    public function emailUnique($email): bool
    {
        // $conn = new Conn();
        // $result = $conn->pdo->query("SELECT * FROM users WHERE email='" . $email . "'");
        // $result->execute();
        $user = $this->database->getUser($email);
        // dd($user);
        if ($user) {
            $this->session->put('error', 'Email already in use.');
            return false;
        }
        return true;
    }

    /**
     * Checks if the given email is in the correct format
     * @param string $email Email address to be validated
     * @return bool
     */
    public function emailFormat($email): bool
    {
        $conn = new Conn();
        $result = $conn->pdo->query("SELECT * FROM users WHERE email='" . $email . "'");
        $result->execute();
        if ($result->rowCount() != 0) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->session->put('error', 'Enter a valid email format');
                return false;
            }
            return true;
        }
    }

    /**
     * Checks if the given password is in the correct format
     * Password requires AT LEAST one uppercase character, one lowercase character, one number, one special character and be at least 8 characters long.
     * @param string $password password  to be validated
     * 
     * @return bool
     */
    public function passwordFormat($password): bool
    {
        $regex = "/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/";
        if (!preg_match($regex, $password)) {
            $this->session->put('error', 'Password must contain at least one uppercase character, one lowercase character, one number, one special character and be at least 8 characters long.');
            return false;
        }
        return true;
    }

    /**
     * Checks if the given password matches the hashed password from db
     * @param string $password password
     * @param string $hashed_password hashed password 
     * 
     * @return bool
     */
    public function passwordHash($password, $hashed_password): bool
    {
        if ($hashed_password == password_verify($password, $hashed_password)) {
            return true;
        }
        return false;
    }
}
