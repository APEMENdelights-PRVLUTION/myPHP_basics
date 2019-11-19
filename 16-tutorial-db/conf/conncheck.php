<?php
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection, let die if error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo if successfully
echo "Connected successfully";
?>