<?php

namespace App\Core\Helpers;

class Hash
{
    /**
     * Hash given string
     * @param $str string
     * @return string
     */
    public static function make($str): string
    {
        $str_hashed =  trim(password_hash($str, PASSWORD_DEFAULT));
        return $str_hashed;
    }
}
