<?php

namespace App\Core\Helpers;

class Str
{
    /**
     * Return the string in lowecase
     * @param string $str
     */
    public static function lower(string $str): string
    {
        $str =  trim(strtolower($str));
        return $str;
    }
}
