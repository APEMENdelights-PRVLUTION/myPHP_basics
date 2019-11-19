<html>
<body>

<?php

/*
 * The Switch Statement
If you want to select one of many blocks of code to be executed, use the Switch statement.
The switch statement is used to avoid long blocks of if..elseif..else code.
Syntax
switch (expression){
   case label1:
      code to be executed if expression = label1;
      break;

   case label2:
      code to be executed if expression = label2;
      break;
      default:

   code to be executed
   if expression is different
   from both label1 and label2;
}
Example
The switch statement works in an unusual way. First it evaluates given expression then seeks a
lable to match the resulting value. If a matching value is found then the
code associated with the matching label will be executed or if none of the lable matches
then statement will execute any specified default code.
 */


$d = date("D");

switch ($d){
    case "Mon":
        echo "Today is Monday";
        break;

    case "Tue":
        echo "Today is Tuesday";
        break;

    case "Wed":
        echo "Today is Wednesday";
        break;

    case "Thu":
        echo "Today is Thursday";
        break;

    case "Fri":
        echo "Today is Friday";
        break;

    case "Sat":
        echo "Today is Saturday";
        break;

    case "Sun":
        echo "Today is Sunday";
        break;

    default:
        echo "Wonder which day is this ?";
}
?>

</body>
</html>
