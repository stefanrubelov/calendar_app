<?php

namespace App\Core\database;

use PDO;
use App\Core\database\Conn;


class Database extends Conn
{
    /**
     * Insert into selected table the given recources
     * 
     * @param string $table table name
     * @param array $parameters parameters to be inserted into db
     */
    public function insert(string $table, array $parameters)
    {
        $query = sprintf(
            'INSERT INTO %s (%s) VALUES(%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($parameters);
        } catch (\Throwable $th) {
            dd('something went wrong');
        }
    }

    /**
     * Return one user by email
     * @param $email user email
     * 
     * @return array|bool
     */
    public function getUser(string $email): array|bool
    {
        $user = $this->pdo->query("SELECT * FROM users WHERE email='" . $email . "' LIMIT 1");
        $user = $user->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return $user;
        }
        return false;
    }


    /**
     * Get all recources from a (given) table
     * @param string $table
     *  
     * @return array|bool
     */
    public function getAll(string $table): array|bool
    {
        $data = $this->pdo->query("SELECT * FROM $table");
        $data = $data->fetch(PDO::FETCH_ASSOC);
        if ($data) {
            return $data;
        }
        return false;
    }

    /**
     * Get all recources from a (given) table
     * @param string $table
     *  
     * @return array|bool
     */
    public function getColumn(string $table, string $column): array|bool
    {
        $data = $this->pdo->query("SELECT $column FROM $table");
        $data = $data->fetch(PDO::FETCH_NUM);
        if ($data) {
            return $data;
        }
        return false;
    }
}
