<?php
// Data Source Name (DNS)
$dsn = "mysql:host=localhost;dbname=discounter";
$username = 'root';
$password = null;

// Creates a PHP Data Object (PDO) "connection"
$conn = new PDO($dsn, $username, $password);

// Connects to the database and returns a specific mySQL query as array
function getOne($query, array $binds = [], $conn)
{
    $statement = $conn->prepare($query);
    foreach($binds as $key => $value) {
        $statement->bindValue($key, $value);
    }
    $statement->execute();
    $result = $statement->fetch();
    $statement->closeCursor();
    return $result;
}
// Connects to the database and returns a table as array
function getMany($query, array $binds = [], $conn)
{
    $statement = $conn->prepare($query);
    foreach($binds as $key => $value) {
        $statement->bindValue($key, $value);
    }
    $statement->execute();
    $results = $statement->fetchAll();
    $statement->closeCursor();
    return $results;
}