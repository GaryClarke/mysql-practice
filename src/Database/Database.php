<?php

namespace App\Database;

use PDO;

class Database {
    private static $instance = null;
    private $pdo;

    // Constructor to establish a PDO connection
    private function __construct() {
        $dsn = "mysql:host=mysql;dbname=course_db";  // DSN for the database connection
        $username = "user";                          // Username for the database
        $password = "studentpassword";               // Password for the database

        // Creating a new PDO connection
        $this->pdo = new PDO($dsn, $username, $password);
        // Setting error mode to exception to handle errors more effectively
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Method to get an instance of the database connection
    public static function getInstance(): ?Database
    {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Method to get the PDO connection
    public function getPDO(): PDO
    {
        return $this->pdo;
    }

    // Prevent the instance from being cloned (which would create a second instance of it)
    private function __clone() {}
}

/**
 * ### Explanation:
 * - **Singleton Pattern**: This class uses the singleton design pattern to ensure that only one instance of the database connection is created. This is useful for managing resources efficiently and avoiding multiple connections.
 * - **Private Constructor**: The constructor is private to prevent creating instances from outside the class, enforcing the singleton pattern.
 * - **getInstance Method**: This static method checks if an instance of the class already exists. If it doesn't, it creates one; if it does, it returns the existing one.
 * - **getPDO Method**: This method provides access to the PDO object, allowing you to perform database operations.
 * - **Error Handling**: The PDO connection is configured to throw exceptions when errors occur. This makes it easier to handle errors using try-catch blocks in your applications.
 * - **__clone Method**: The private `__clone` method prevents cloning of the instance, further enforcing the singleton pattern.
 *
 * This class provides a robust and reusable way to manage PDO database connections in your PHP applications, aligning with best practices in object-oriented programming and database management.
 */
