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
