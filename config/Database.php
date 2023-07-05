<?php

class Database
{
    private $host = "127.0.0.1";
    private $port = "5432";
    private $database_name = "apidb";
    private $username = "postgres";
    private $password = "password";
    private static $instance = null;
    public $connection;

    public static function getInstance() {

        if(is_null(self::$instance)) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        $this->connection = null;
        try {
            $this->connection = new PDO("pgsql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->database_name, $this->username, $this->password);
        } catch (PDOException $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $this->connection;
    }
}

?>