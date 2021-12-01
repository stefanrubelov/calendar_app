<?php

use App\Router;

require __DIR__ . '\config.php';
// require __DIR__ . '/routes.php';
// require __DIR__ . '\database\Conn.php';



require_once __DIR__ . '\App\Router.php';



function dd($val)
{
    echo "<pre>";
    var_dump($val);
    echo "</pre>";
    die();
}
