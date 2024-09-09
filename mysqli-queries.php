<?php

// Connect to MySQL using mysqli (procedural)
$link = mysqli_connect("mysql", "user", "studentpassword", "course_db");
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully using procedural style\n";

// Prepare a SELECT statement to fetch employee data
$query = "SELECT id, name, department FROM employees";

// Execute the query
$result = mysqli_query($link, $query);

// Check if the query was successful
if (!$result) {
    die('Query failed: ' . mysqli_error($link));
}

// Fetch and display each row of data
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row['id'] . " - Name: " . $row['name'] . " - Department: " . $row['department'] . "\n";
    }
} else {
    echo "No results found.";
}

// Free result set
mysqli_free_result($result);

// Close the connection
mysqli_close($link);


