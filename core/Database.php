<?php

namespace Core;
use mysqli;

class Database
{
    private static $instance = null;
    private $connection;

    private $host = 'localhost';
    private $user = 'root';
    private $password = 'root'; // Default for MAMP
    private $database = 'mini_pos2';

    private function __construct()
    {
        $this->connection = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->database
        );

        if ($this->connection->connect_error) {
            die('Database connection failed: ' . $this->connection->connect_error);
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}


