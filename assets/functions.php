<?php

function dd($val)
{
    echo "<pre>";
    var_dump($val);
    echo "</pre>";
    die();
}

function redirectIfNotPost($url = '/')
{
    if ($_SERVER['REQUEST_METHOD'] != "POST") {
        header_remove();
        header("Location: $url");
        die();
    }
}
