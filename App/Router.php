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
     */
    public function define($routes): void
    {
        $this->routes = $routes;
    }

    /**
     * Redirect page to the appropriate route (redirrect to error page if route not found)
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
     * 
     */
    public static function header($header): void
    {
        header_remove();
        header("Location: $header");
    }
}
