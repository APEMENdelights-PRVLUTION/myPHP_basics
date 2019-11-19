<?php
// Connect to server root
include './conf/root_con.php';

// Create database
$sql = "CREATE DATABASE myphp";
if ($conn->query($sql) === TRUE) {
    // if successful echo feedback
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
