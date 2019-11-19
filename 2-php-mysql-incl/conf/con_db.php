<?php

// Create connection
$conn = new PDO('mysql:host=localhost;dbname=myphp' , 'root', 'root');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>