<?php

namespace App;

class Session
{
    /**
     * Set new session
     * @param string $session_name Session title to be set
     * @param string $session_value Session value to be set
     * 
     * @return void
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
     * @param string $session_name Session title to be get(got?)
     * 
     * @return string|bool
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
     * Unset all the sessions 
     *
     * @return void
     */
    public static function destroy(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_destroy();
    }
}
