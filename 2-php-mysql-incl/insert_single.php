<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myphp";
$tbname = "myphp";

$name_in = "Kill";
$surname_in = "Kill";
$mail_in = "Kill@some.de";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO $tbname (firstname, lastname, email)
VALUES ('$name_in', '$surname_in', '$mail_in')";

if ($conn->query($sql) === true) {
	$last_id = $conn->insert_id;
	echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>