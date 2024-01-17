<?php

class CardRepository
{
    private DatabaseManager $databaseManager;

    // This class needs a database connection to function
    public function __construct(DatabaseManager $databaseManager)
    {
        $this->databaseManager = $databaseManager;
    }

    public function create(): void
    {
        $name = $_POST["name"];
        $amount = $_POST["amount"];
        $type = $_POST["type"];
    
        try {
            $sql = "INSERT INTO cards (name, amount, type)
            VALUES (?, ?, ?);";
    
            $statement = $this->databaseManager->connection->prepare($sql);
            $statement->execute([$name, $amount, $type]);
        } catch (PDOException $error) {
            die("Query failed: ". $error->getMessage());
        };
    }

    public function find(): array
    {
        try {
            $sql = "SELECT * FROM cards WHERE id = :id ;";
            $statement = $this->databaseManager->connection->prepare($sql);
            $statement->bindParam(':id', $_GET['id']);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            echo "Error: " . $error->getMessage();
            return [];
        }
    }

    public function get()
    {
        $sql = "SELECT * FROM cards";
        $statement = $this->databaseManager->connection->prepare($sql);
        $statement->execute();
        $cards = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $cards;
    }

        public function update(): void
        {
            try {
                $sql = "UPDATE cards SET name = :name, type = :type, amount = :amount WHERE id = :id";
                $statement = $this->databaseManager->connection->prepare($sql);
    
                $statement->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
                $statement->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
                $statement->bindParam(':type', $_POST['type'], PDO::PARAM_STR);
                $statement->bindParam(':amount', $_POST['amount'], PDO::PARAM_INT);
    
                $statement->execute();
            } catch (PDOException $error) {
                echo "Error: " . $error->getMessage();
            }
        }

    public function delete(): void
    {
    try {
        $sql = "DELETE FROM cards WHERE id = :id;";
        $statement = $this->databaseManager->connection->prepare($sql);

        $statement->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
        $statement->execute();

    }  catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
    }

}