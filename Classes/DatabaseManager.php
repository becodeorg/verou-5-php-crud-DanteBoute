<?php

// This class will manage the connection to the database
// It will be passed on the other classes who need it
class DatabaseManager
{
    // These are private: only this class needs them
    private $host = "localhost";
    private $dbname = "pokemonCards";
    private $user = "root";
    private $password = "";

    // This one is public, so we can use it outside of this class
    // We could also use a private variable and a getter (but let's not make things too complicated at this point)
    public PDO $connection;

    public function __construct($host, $user, $password, $dbname) {
        $this->connect();
    }

    public function connect() {
        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname";
            $this->connection = new PDO($dsn, $this->user, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }
}