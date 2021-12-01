<?php

namespace App;

use Exception;




class Router
{
    /**
     * @var array $routes
     */
    protected $routes = [];

    /**
     * 
     */
    public function define($routes)
    {
        $this->routes = $routes;
    }

    /**
     * 
     */
    public function redirect($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            return $this->routes[$uri];
        }

        throw new Exception('404, page not found');
    }
}
