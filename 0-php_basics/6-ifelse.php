<html>
<body>

<?php
/*
 * The If...Else Statement
If you want to execute some code if a condition is true and another code if a condition is false, use the if....else statement.

Syntax
if (condition)
   code to be executed if condition is true;
else
   code to be executed if condition is false;
Example
The following example will output "Have a nice weekend!" if the current day is Friday, Otherwise, it will output "Have a nice day!":
 */

$d = date("D");

if ($d == "Fri")
    echo "Have a nice weekend!";

else
    echo "Have a nice day!";
?>

</body>
</html>
