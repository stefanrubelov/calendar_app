<?php

namespace App\Controllers;

class DashboardController
{
    // public $name = 'Stefan';

    /**
     * returns the main page view
     * 
     * @return void
     */
    public function index(): void
    {
        require_once 'views/main.view.php';
    }
}
