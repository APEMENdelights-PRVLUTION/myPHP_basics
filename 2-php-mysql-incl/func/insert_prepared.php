<?php

/*
This function binds the parameters to the SQL query and tells
the database what the parameters are.
The "sss" argument lists the types of data that the parameters are.
The s character tells mysql that the parameter is a string.
The argument may be one of four types:

i - integer
d - double
s - string
b - BLOB

For the values we use ?, ? ,? regarding to the fact that we are
*/

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myphp";
$tbname = "myphp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$stmt = $conn->prepare("INSERT INTO $tbname (firstname, lastname, email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $firstname, $lastname, $email);

// set parameters and execute
$firstname = "John";
$lastname = "Doe";
$email = "john@example.com";
$stmt->execute();

$firstname = "Mary";
$lastname = "Moe";
$email = "mary@example.com";
$stmt->execute();

$firstname = "Julie";
$lastname = "Dooley";
$email = "julie@example.com";
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>