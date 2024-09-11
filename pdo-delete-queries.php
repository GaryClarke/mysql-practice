<?php

require 'vendor/autoload.php';

$pdo = \App\Database\Database::getInstance()?->getPDO();

// Prepare a DELETE statement
$stmt = $pdo->prepare("DELETE FROM employees WHERE id = :id");
$employeeId = 5; // Example ID of the employee to delete

// Bind the ID parameter to ensure precise deletion
$stmt->bindParam(':id', $employeeId, PDO::PARAM_INT);

// Execute the statement and check for success
if ($stmt->execute()) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $stmt->errorInfo()[2];
}

//### Code Explanation:
//- **PDO Preparation**: Using the `prepare` method with a placeholder (`:id`) helps prevent SQL injection by keeping the command parameterized.
//- **Parameter Binding**: The `bindParam` method securely binds the variable `$employeeId` to the placeholder in the SQL statement. This method ensures that the delete operation is performed only on the intended record.
//- **Execution and Error Handling**: The `execute` method runs the prepared statement. It checks if the operation was successful and prints a success message or an error message detailing what went wrong using `errorInfo()`.
//
//This code snippet exemplifies a secure and precise way to handle deletions in a database using PDO, ensuring that only the specified record is affected by the delete operation.