<?php

namespace App\Controllers;

use App\Core\Auth;
use App\Core\Router;
use App\Core\Request;
use App\Core\Session;
use App\Core\Validate;
use App\Core\database\Conn;
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
    public function __construct($name, $email, $password)
    {
        parent::__construct(new Conn(), new Request(), new Router(), new Session(), new Validate(), new Auth());
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Saves new user to database
     * @param string $query
     * 
     * @return void
     */
    public function query($query = 'INSERT INTO users (name, email, password) values(:name, :email, :password)'): void
    {
        // if (Validate::empty($this->name, $this->email, $this->password) && Validate::emailUnique($this->email)) {
        if ($this->validate->empty($this->name, $this->email, $this->password) && $this->validate->emailUnique($this->email)) {
            $stmt = $this->conn->pdo->prepare($query);
            $stmt->execute(
                [
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => password_hash($this->password, PASSWORD_DEFAULT)
                ]
            );
            Session::put('success', 'You registered successfully, you can log in now.');
            Router::header('/login');
            return;
        } else {
            Router::header('/register');
            return;
        }
    }
}
