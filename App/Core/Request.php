<?php

namespace App\Core;

class Request
{
    /**
     * Outputs the page uri
     * 
     * @return string
     */
    public static function uri(): string
    {
        return trim(
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH),
            '/'
        );
    }

    /**
     * Return the form method
     * @return string
     */
    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
