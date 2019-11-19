<?php
include './incl/head.php';


//
//
// The while() loop loops through the result set and outputs
//
//The following example shows the same as the example above, in the MySQLi procedural way:
//
// Connect to server root
include './conf/con-mysqli.php';

$tbname = "myphp";

/*
 * First, we set up an SQL query that selects the id, firstname and
 * lastname columns from the MyGuests
 */
$sql = "SELECT id, firstname, lastname, reg_date FROM $tbname";
// The next line of code runs the query and puts the resulting data into a variable called $result.
$result = $conn->query($sql);

// Then, the function num_rows() checks if there are more than zero rows returned.
//If there are more than zero rows returned, the function fetch_assoc()
if ($result->num_rows > 0) {
    // echoes all the results into a table with table head
    echo "<table><tr><th>ID</th><th>Name</th><th>surname</th><th>joined</th></tr>";
    // The while() loop loops through the result set and outputs
    while($row = $result->fetch_assoc()) {
        // output data of each row
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"]. "</td><td> " . $row["lastname"]. "</td><td> " . $row["reg_date"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo " 0 results ";
}

$conn->close();
?>

</body>
</html>