<?php

namespace App;

class Request
{
    /**
     * Outputs the uri
     * @return string
     */
    public static function uri(): string
    {
        return trim($_SERVER['REQUEST_URI'], '/');
    }
}
