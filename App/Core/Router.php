<?php

namespace App\Core;

class Router
{
    /**
     * @var array $routes
     */
    protected $routes = [
        'GET' => [],
        'POST' => []
    ];

    /**
     * @var array $error_routes
     */
    protected $error_routes = [
        404 => __DIR__ . '\..\views\errors\404.view.php'
    ];

    /**
     * Define the $routes['GET'] routes
     * @param string $uri 
     * @param string $controller 
     * 
     * @return void
     */
    public function get($uri, $controller): void
    {
        $this->routes['GET'][$uri] = $controller;
    }

    /**
     * Define the $routes['POST'] routes
     * @param string $uri 
     * @param string $controller
     * 
     * @return void
     */
    public function post($uri, $controller): void
    {
        $this->routes['POST'][$uri] = $controller;
    }

    /**
     * Loads the routes file
     * @param string $file Routes file path  
     * 
     * @return new static instance of class
     */
    public static function load($file): static
    {
        $router = new static;

        require $file;

        return $router;
    }

    // /**
    //  * Define the $routes array
    //  * @param array $routes Getter for the array of routes 
    //  * 
    //  * @return void
    //  */
    // public function define($routes): void
    // {
    //     $this->routes = $routes;
    // }

    /**
     * Redirect page to the appropriate route (redirrect to error page if route not found)
     * @param string $uri Page uri where the user will be redirected
     * 
     */
    public function redirect($uri, $request_type)
    {
        if (array_key_exists($uri, $this->routes[$request_type])) {
            return $this->routes[$request_type][$uri];
        }
        return $this->error_routes[404];
    }

    /**
     * Redirect to given header
     * @param string $header Header address where the page will be redirected
     * @return void
     */
    public static function header($header): void
    {
        header_remove();
        header("Location: $header");
        die();
    }
}
