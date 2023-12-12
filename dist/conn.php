<?php
$dbHost = "db";
$dbUser = "root";
$dbPass = "sourcekode";
$dbName = "SourceKode";

// Connect to the database
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>