<?php
// Connect to MySQL using mysqli (procedural)
$link = mysqli_connect("mysql", "user", "studentpassword", "course_db");
if (!$link) {
die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully using procedural style";
// Comment: This procedural example establishes a connection to MySQL using mysqli. It checks for connection errors and prints a success message if connected.
