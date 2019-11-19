<html>
<body>
<?php

/*
 * The do...while loop statement
The do...while statement will execute a block of code at least once - it then will repeat the loop as long
as a condition is true.
Syntax
do {
   code to be executed;
}
while (condition);
Example
The following example will increment the value of i at least once, and it will continue incrementing
the variable i as long as it has a value of less than 10 −
 */

$i = 0;
$num = 0;

do {
    $i++;
}

while( $i < 10 );
echo ("Loop stopped at i = $i" );
?>

</body>
</html>
