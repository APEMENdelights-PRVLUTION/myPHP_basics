<?php

// Update Data In a MySQL Table Using MySQLi and PDO
// The UPDATE statement is used to update existing records in a table:
//
// UPDATE table_name
// SET column1=value, column2=value2,...
// WHERE some_column=some_value
// Notice the WHERE clause in the UPDATE syntax:
// The WHERE clause specifies which record or records that should be updated.
// If you omit the WHERE clause, all records will be updated!


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myphp";
$tbname = "myphp";
$name = "Frank";
$id = "1";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE $tbname SET lastname='$name' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
