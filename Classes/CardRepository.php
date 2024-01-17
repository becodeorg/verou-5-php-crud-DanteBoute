<?php

// This class is focussed on dealing with queries for one type of data
// That allows for easier re-using and it's rather easy to find all your queries
// This technique is called the repository pattern
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

    }

    // Get one
    public function find()
    
    {
        $sql = "SELECT * FROM cards WHERE type = :type;";

    try {
        $statement = $this->databaseManager->connection->prepare($sql);
        $statement->bindParam(':type', $type, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
        // Handle the error appropriately (e.g., log it or return an empty array)
        return [];
    }
    }

    // Get all
    public function get()
    {
        // TODO: Create an SQL query
        $sql = "SELECT * FROM cards";
        // TODO: Use your database connection (see $databaseManager) and send your query to your database.
        $statement = $this->databaseManager->connection->prepare($sql);
        $statement->execute();
        // TODO: fetch your data at the end of that action.
        $cards = $statement->fetchAll(PDO::FETCH_ASSOC);
        // TODO: replace dummy data by real one
        return $cards;
    }
        // Prepare and execute the query
    

    // Fetch all rows as an associative array
    

    // Display the data
    

        // We get the database connection first, so we can apply our queries with it
        // return $this->databaseManager->connection-> (runYourQueryHere)

        public function update($cardId, $newData): void
        {
            $sql = "UPDATE cards SET name = :name, type = :type, amount = :amount WHERE id = :id";
    
            try {
                $statement = $this->databaseManager->connection->prepare($sql);
    
                // Bind parameters
                $statement->bindParam(':id', $cardId, PDO::PARAM_INT);
                $statement->bindParam(':name', $newData['name'], PDO::PARAM_STR);
                $statement->bindParam(':type', $newData['type'], PDO::PARAM_STR);
                $statement->bindParam(':amount', $newData['amount'], PDO::PARAM_INT);
    
                // Execute the query
                $statement->execute();
            } catch (PDOException $error) {
                echo "Error: " . $error->getMessage();
                // Handle the error appropriately (e.g., log it or display a user-friendly message)
            }
        }

    public function delete(): void
    {

    }

}