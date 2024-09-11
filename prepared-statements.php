<?php
// Connect to MySQL using mysqli
$mysqli = new mysqli("localhost", "user", "password", "database");

// Check connection
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

// Prepare a statement to insert data
$stmt = $mysqli->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $email); // 'ss' indicates two string parameters

// Set parameters and execute
$username = "newuser";
$email = "user@example.com";
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$mysqli->close();

//**Comments**:
//- **Prepare and Bind**: The `prepare` method sets up the SQL statement with placeholders, and `bind_param` securely binds variables to these placeholders.
//- **Execution**: The `execute` method runs the statement with the bound parameters, securely inserting data into the database.

### Using Prepared Statements with PDO

// Connect to MySQL using PDO
$pdo = new PDO("mysql:host=localhost;dbname=database", "user", "password", [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
]);

// Prepare a statement to select data
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$email = "user@example.com";

// Execute with parameter
$stmt->execute([$email]);

// Fetch results
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($results as $row) {
    echo $row['username'] . "<br>";
}

$pdo = null; // Close connection

//**Comments**:
//- **Prepare and Execute**: Uses placeholders in the `prepare` method and passes the data directly in the `execute` method, which automatically handles parameter binding.
//- **Fetch and Output**: Retrieves and displays the data securely, ensuring that the input data does not directly influence the logic of the SQL statement.
//
//These examples illustrate how to implement prepared statements effectively in PHP using both `mysqli` and `PDO`, providing robust defense mechanisms against SQL injection while maintaining clarity and efficiency in code.