<!DOCTYPE html>
<html>
<body>

<?php

/*
Create a Date From a String With strtotime()
The PHP strtotime() function is used to convert a human
readable date string into a Unix timestamp
(the number of seconds since January 1 1970 00:00:00 GMT).

Syntax
strtotime(time, now)
The example below creates a date and time from the strtotime() function:
*/
$d=strtotime("10:30pm April 15 2014");
echo "Created date is " . date("Y-m-d h:i:sa", $d);
?>

</body>
</html>
