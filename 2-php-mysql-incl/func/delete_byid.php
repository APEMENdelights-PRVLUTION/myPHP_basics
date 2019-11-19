<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myphp";
$tname = "myphp";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}



//Delete Data From a MySQL Table Using MySQLi and PDO
//The DELETE statement is used to delete records from a table:
//
//DELETE FROM table_name
//WHERE some_column = some_value
//Notice the WHERE clause in the DELETE syntax: The WHERE clause specifies which record or records that should be deleted. If you omit the WHERE clause, all records will be deleted!
//
//To learn more about SQL, please visit our SQL tutorial.
//

// sql to delete a record
$sql = "DELETE FROM $tname WHERE id = 2";

if ($conn->query($sql) === true) {
	echo "Record deleted successfully";
} else {
	echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>