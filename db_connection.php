<?php
$servername = "sql311.infinityfree.com";
$username = "if0_36695787"; // Change this to your actual MySQL username
$password = "tteldiF4rVti"; // Change this to your actual MySQL password, or leave it empty if no password is set
$dbname = "if0_36695787_workconnect"; // Change this to your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
