<?php

class DatabaseManager
{

    private $host;
    private $dbname;
    private $user;
    private $password;

    public PDO $connection;

    public function __construct($host, $user, $password, $dbname) {
       $this->host = $host;
       $this->dbname = $dbname;
       $this->user = $user;
       $this->password = $password;
    }

    public function connect(): void {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname";
            $this->connection = new PDO($dsn, $this->user, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            // last line makes the data coming back from the DB an associative array
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}