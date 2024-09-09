<?php

// Connect to MySQL using PDO
try {
    $dsn = "mysql:host=mysql;dbname=course_db"; // DSN string includes the database type, host (service name in Docker), and database name
    $username = "user"; // Username for the MySQL database
    $password = "studentpassword"; // Password for the MySQL database

    // Creating a new PDO instance to manage a database connection
    $pdo = new PDO($dsn, $username, $password);

    // Set attribute to throw exceptions on errors, which is critical for robust error handling
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully"; // Success message if connection is successful
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage()); // Error handling to catch and display connection errors
}
// Comment: This script demonstrates how to establish a connection to a MySQL database using PDO with exception handling. It ensures secure and robust database interactions.

