<?php
$serverName = "localhost";
$dbUsername = "defaultuser"; // Replace 'your_username' with the actual database username
$dbPassword = "defaultuser"; // Replace 'your_password' with the actual database password
$dbName = "my_db"; // Replace 'my_db' with the actual database name

// Create a connection to the database
$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

