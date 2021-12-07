<?php

namespace App;

class Router
{
    /**
     * @var array $routes
     */
    protected $routes = [];

    /**
     * @var array $error_routes
     */
    protected $error_routes = [
        404 => __DIR__ . '\..\views\errors\404.view.php'
    ];

    /**
     *Loads the routes file
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

    /**
     * Define the $routes array
     * @param array $routes Getter for the array of routes 
     * 
     * @return void
     */
    public function define($routes): void
    {
        $this->routes = $routes;
    }

    /**
     * Redirect page to the appropriate route (redirrect to error page if route not found)
     * @param string $uri Page uri where the user will be redirected
     * 
     * @return string
     */
    public function redirect($uri): string
    {
        if (array_key_exists($uri, $this->routes)) {
            return $this->routes[$uri];
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
