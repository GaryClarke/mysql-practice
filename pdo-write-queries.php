<?php

require 'vendor/autoload.php';

$pdo = \App\Database\Database::getInstance()?->getPDO();

// Prepare an INSERT statement
$stmt = $pdo->prepare("INSERT INTO employees (name, department, salary) VALUES (?, ?, ?)");
$data = ['John Doe', 'Sales', 50000];

// Execute the statement with data
if ($stmt->execute($data)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->errorInfo()[2];
}

//**Comments**:
//- **Prepared Statement**: This uses placeholders (`?`) to ensure data is inserted securely, preventing SQL injection.
//- **Execution**: Data is bound to the placeholders when the statement is executed, enhancing security and efficiency.
//- **Error Handling**: Checks if the execution was successful and prints an error message if it fails.

### Code for Updating Data Using PDO
