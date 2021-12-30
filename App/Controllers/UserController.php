<?php

namespace App\Controllers;

use App\Core\Helpers\Hash;
use App\Core\Router;
use App\Core\Helpers\Str;
use App\Controllers\Controller;

class UserController extends Controller
{
    /**
     *@var string $name 
     */
    private $name;

    /**
     * @var string $email
     */
    private $email;

    /**
     * @var string $password
     */
    private $password;


    /**
     * AddUser constructor
     * @param string $this->name
     * @param string $this->email 
     * @param string $this->password 
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        require_once 'views/register.view.php';
    }

    /**
     * Saves new user to database
     * @param string $query
     * 
     * @return void
     */
    public function saveUser(): void
    {
        $this->name = $_POST['name'];
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];
        if ($this->validate->empty($this->name, $this->email, $this->password) && $this->validate->emailUnique($this->email) && $this->validate->passwordFormat($this->password)) {
            $this->database->insert(
                'users',
                [
                    'name' => $this->name,
                    'email' => Str::lower($this->email),
                    'password' => Hash::make($this->password)
                ]
            );

            $this->session->put('success', 'You registered successfully, you can log in now.');
            Router::header('/login');
            return;
        } else {
            Router::header('/register');
            return;
        }
    }
}
