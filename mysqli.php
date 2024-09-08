<?php

// Connect to MySQL using mysqli (procedural)
$link = mysqli_connect("localhost", "user", "password", "database");
if (!$link) {
die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully (procedural)";
// Comment: This procedural example establishes a connection to MySQL. It checks for connection errors and prints a success message if connected.

// Connect to MySQL using mysqli (OOP)
$mysqli = new mysqli("localhost", "user", "password", "database");
if ($mysqli->connect_error) {
die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully (OOP)";
// Comment: This object-oriented example demonstrates how to connect to MySQL using mysqli. It handles errors and confirms the connection.

// Insert data using mysqli (OOP)
$query = "INSERT INTO employees (name, department) VALUES ('John Doe', 'Sales')";
if ($mysqli->query($query) === TRUE) {
echo "New record created successfully";
} else {
echo "Error: " . $query . "<br>" . $mysqli->error;
}
// Comment: This code inserts a new record into the 'employees' table. It checks if the query was successful and prints an appropriate message.

// Retrieve data using mysqli (OOP)
$query = "SELECT id, name FROM employees";
$result = $mysqli->query($query);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "id: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
}
} else {
echo "0 results";
}
// Comment: This code retrieves data from the 'employees' table, checking if there are any rows returned before printing each one.

// Update data using mysqli (OOP)
$query = "UPDATE employees SET department = 'Marketing' WHERE name = 'John Doe'";
if ($mysqli->query($query) === TRUE) {
echo "Record updated successfully";
} else {
echo "Error updating record: " . $mysqli->error;
}
// Comment: This code updates the department of an employee named John Doe. It checks if the update was successful and displays an appropriate message.

// Delete data using mysqli (OOP)
$query = "DELETE FROM employees WHERE name = 'John Doe'";
if ($mysqli->query($query) === TRUE) {
echo "Record deleted successfully";
} else {
echo "Error deleting record: " . $mysqli->error;
}
// Comment: This code deletes a record from the 'employees' table. It confirms whether the deletion was successful and provides feedback.

