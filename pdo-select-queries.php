<?php

require 'vendor/autoload.php';

// Get the PDO instance from the connection class
$db = \App\Database\Database::getInstance();
$pdo = $db->getPDO();

// Prepare a SELECT statement to fetch data from the 'employees' table
$stmt = $pdo->prepare("SELECT id, name, department FROM employees");
$stmt->execute();

// Fetch each row as an associative array and display the data
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "ID: " . $row['id'] . ", Name: " . $row['name'] . ", Department: " . $row['department'] . PHP_EOL;
}

// Alternatively, fetching all records at once and iterating through the result set
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $row) {
    echo "ID: " . $row['id'] . ", Name: " . $row['name'] . PHP_EOL;
}

//### Code Explanation:
//- **Database.php Inclusion**: Assumes `Database.php` contains the PDO connection class that implements the singleton pattern.
//- **Singleton Instance**: Retrieves the singleton instance of the database connection class and the PDO object.
//- **Prepare and Execute**: A SQL SELECT query is prepared and executed. Preparing queries is crucial for security, particularly to prevent SQL injection.
//- **Fetching Data**:
//- The first method uses a loop with `fetch(PDO::FETCH_ASSOC)` to get one row at a time as an associative array where column names are keys.
//- The second method uses `fetchAll(PDO::FETCH_ASSOC)` to retrieve all rows at once into an array, which is useful when the result set is expected to be manageable and not excessively large.
//- **Output**: Each row's data is displayed, formatted with HTML `<br>` for readability.
//
//This setup ensures that students learn effective and secure ways to interact with databases using PDO within a structured, object-oriented environment.
