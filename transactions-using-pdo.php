<?php



$db = Database::getInstance();
$pdo = $db->getPDO();

try {
    $pdo->beginTransaction(); // Start the transaction

    // Example of multiple database operations that need to be atomic
    $pdo->exec("UPDATE accounts SET balance = balance - 100 WHERE id = 1");
    $pdo->exec("UPDATE accounts SET balance = balance + 100 WHERE id = 2");

    $pdo->commit(); // Commit the transaction if no error
    echo "Transaction completed successfully";
} catch (Exception $e) {
    $pdo->rollBack(); // Roll back the transaction if something went wrong
    echo "Failed: " . $e->getMessage();
}
?>
```

### Code Explanation:
- **Starting the Transaction**: The `beginTransaction()` method begins a transaction, ensuring that subsequent operations are part of this atomic process.
- **Executing Operations**: Multiple update statements are executed. These updates are just examples; they adjust account balances and are designed to illustrate operations that should be executed together.
- **Committing the Transaction**: If all operations execute successfully, the `commit()` method is called to apply all changes to the database.
- **Error Handling and Rollback**: If any operation fails, an exception is thrown, and the `rollBack()` method is invoked to undo all operations since the transaction began, maintaining data integrity.
- **Exception Handling**: The try-catch block handles exceptions, providing error messages and rolling back transactions to prevent partial updates.

This code provides a practical example of how to implement transactions in PHP using PDO, emphasizing the importance of maintaining consistency and integrity in database operations.