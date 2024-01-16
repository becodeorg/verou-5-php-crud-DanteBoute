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
    // public function find(): array
    // {

    // }

    // Get all
    public function get()
    {
        // TODO: Create an SQL query
        $sql = "SELECT * FROM cards";
        // TODO: Use your database connection (see $databaseManager) and send your query to your database.
        // TODO: fetch your data at the end of that action.
        // TODO: replace dummy data by real one
        // Prepare and execute the query
    $statement = $this->databaseManager->connection->prepare($sql);
    $statement->execute();

    // Fetch all rows as an associative array
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Display the data
    echo "<h2>Pokemon Cards</h2>";
    echo "<ul>";

    foreach ($result as $row) {
        echo "<li>{$row['name']} - {$row['amount']} - {$row['type']}</li>";
    }

    echo "</ul>";

        // We get the database connection first, so we can apply our queries with it
        // return $this->databaseManager->connection-> (runYourQueryHere)
    }

    public function update(): void
    {

    }

    public function delete(): void
    {

    }

}