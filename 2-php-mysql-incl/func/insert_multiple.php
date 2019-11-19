<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myphp";
$tname = "myphp";

$name_1 = "Hugo";
$lname_1 = "Hugo";
$mail_1 = "Hugo@example.com";

$name_2 = "Egon";
$lname_2 = "Egon";
$mail_2 = "Egon@example.com";

$name_3 = "Marc";
$lname_3 = "Marc";
$mail_3 = "Marc@example.com";

// in this example we insert new rows by setting up variables upfront
// however, this is not the best way but it works

// NOTE : STATE OF THE ART IS BIND_PARAM USING PDO HERE CHECK OUT THE SCRIPT

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO $tname (firstname, lastname, email)
VALUES ('$name_1', '$lname_1', '$mail_1');";
$sql .= "INSERT INTO $tname (firstname, lastname, email)
VALUES ('$name_2', '$lname_2', '$mail_2');";
$sql .= "INSERT INTO $tname (firstname, lastname, email)
VALUES ('$name_3', '$lname_3', '$mail_3')";

if ($conn->multi_query($sql) === true) {
	echo "New records created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>