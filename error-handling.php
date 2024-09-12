<?php

$mysqli = new mysqli("localhost", "user", "password", "database");

// Check for a connection error
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Attempt to execute a query
$result = $mysqli->query("SELECT * FROM some_table");
if (!$result) {
    die("Error on query: " . $mysqli->error);
}

// Processing results
while ($row = $result->fetch_assoc()) {
    echo $row['column_name'] . "<br>";
}

$mysqli->close();

//**Comments**:
//- **Error Checking**: Immediately after attempting to connect or execute a query, the script checks for errors.
//- **Error Reporting**: Uses `die()` to halt the script and report the error, suitable for simple scripts or early development stages.

try {
    $pdo = new PDO("mysql:host=localhost;dbname=database", "user", "password", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    // Execute a query
    $stmt = $pdo->prepare("SELECT * FROM some_table");
    $stmt->execute();

    // Fetch results
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['column_name'] . "<br>";
    }
} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
} catch (Exception $e) {
    die("General error: " . $e->getMessage());
}

$pdo = null; // Close connection

//**Comments**:
//- **Exception Handling**: Configures PDO to throw exceptions and wraps operations in a try-catch block to handle both database-specific and general errors.
//- **Clean Error Reporting**: Exceptions provide a clean way to handle errors and separate error handling logic from regular code flow.

### Advanced Exception Handling in PDO

try {
    $pdo = new PDO("mysql:host=localhost;dbname=database", "user", "password");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $pdo->prepare("SELECT * FROM non_existent_table");
    $stmt->execute();
} catch (PDOException $e) {
    echo "An error occurred: " . $e->getMessage();
}

//**Comments**:
//- **Detailed Error Info**: Demonstrates handling errors when attempting to interact with a database table that doesn't exist, catching the specific PDO exception to provide detailed feedback.
//
//These examples illustrate best practices for error handling in PHP using `mysqli` and `PDO`, focusing on robust techniques to manage and report errors effectively in different scenarios.