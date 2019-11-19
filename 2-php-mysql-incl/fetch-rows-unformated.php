<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "myphp";
$tbname = "myphp";

//  firstname and lastname columns.
// The following example shows the same as the example above, in the MySQLi procedural way:
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// First, we set up an SQL query that selects the id, firstname and lastname columns from the
// $tbname table.
// The next line of code runs the query and puts the resulting data into a variable called $result.

$sql = "SELECT id, firstname, lastname FROM $tbname ";
$result = $conn->query($sql);
// Then, the function num_rows() checks if there are more than zero rows returned.
if ($result->num_rows > 0) {
// If there are more than zero rows returned, the function fetch_assoc() puts all the results into an associative
// array that we can loop through. The while() loop loops through the result set and outputs the data from the id,

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>