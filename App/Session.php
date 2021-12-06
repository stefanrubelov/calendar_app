<?php

namespace App;

class Session
{
    /**
     * Set new session
     * @return string
     */
    public static function put($session_name, $session_value): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION[$session_name]) && empty($_SESSION[$session_name])) {
            $_SESSION[$session_name] = $session_value;
        }
    }

    /**
     * Get session value
     * @return string
     */
    public static function get($session_name): string|bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_SESSION[$session_name]) && !empty($_SESSION[$session_name])) {
            return $_SESSION[$session_name];
        } else {
            return false;
        }
    }

    /**
     * Unset session
     */
    public static function unset()
    {
        session_unset();
    }
}
