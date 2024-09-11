<?php

require 'vendor/autoload.php';

$pdo = \App\Database\Database::getInstance()?->getPDO();

// Prepare an UPDATE statement
$stmt = $pdo->prepare("UPDATE employees SET salary = :salary WHERE id = :id");
$newSalary = 60000;
$employeeId = 7;

// Bind parameters to the prepared statement for security and precision
$stmt->bindParam(':salary', $newSalary, PDO::PARAM_INT);
$stmt->bindParam(':id', $employeeId, PDO::PARAM_INT);

// Execute the statement and check for success
if ($stmt->execute()) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $stmt->errorInfo()[2];
}

//### Code Explanation:
//- **PDO Preparation**: The `prepare` method is used to prepare the SQL update statement, preventing SQL injection risks by avoiding direct inclusion of variables in the SQL query.
//- **Parameter Binding**: The `bindParam` method securely binds the PHP variables `$newSalary` and `$employeeId` to the named placeholders `:salary` and `:id` in the SQL statement. This not only improves security but also makes the code more readable and maintainable.
//- **Execution and Error Handling**: The `execute` method runs the prepared statement. The success of the operation is checked, and the script either prints a success message or an error message detailing what went wrong using `errorInfo()`.
//
//This approach ensures that updates to the database are performed securely and efficiently, leveraging PDO’s capabilities to handle SQL statements in a safe manner.