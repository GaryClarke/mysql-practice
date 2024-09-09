<?php

// Connect to MySQL using mysqli (OOP)
$mysqli = new mysqli("mysql", "user", "studentpassword", "course_db");
if ($mysqli->connect_error) {
die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully using OOP style";
