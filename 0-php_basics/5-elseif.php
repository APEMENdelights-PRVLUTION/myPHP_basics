<html>
<body>

<?php

/*
 * The ElseIf Statement
If you want to execute some code if one of the several conditions are true use the elseif statement
Syntax
if (condition)
   code to be executed if condition is true;
elseif (condition)
   code to be executed if condition is true;
else
   code to be executed if condition is false;
Example
The following example will output "Have a nice weekend!" if the current day is Friday, a
nd "Have a nice Sunday!" if the current day is Sunday. Otherwise, it will output "Have a nice day!"
 *
 */
$d = date("D");

if ($d == "Fri")
    echo "Have a nice weekend!";

elseif ($d == "Sun")
    echo "Have a nice Sunday!";

else
    echo "Have a nice day!";
?>

</body>
</html>
