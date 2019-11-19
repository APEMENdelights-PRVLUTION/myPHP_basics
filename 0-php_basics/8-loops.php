<html>
<body>



<?php
/*
 *
 * Loop Types
Loops in PHP are used to execute the same block of code a specified number of times. PHP supports following four loop types.
	• for − loops through a block of code a specified number of times.
	• while − loops through a block of code if and as long as a specified condition is true.
	• do...while − loops through a block of code once, and then repeats the loop as long as a special condition is true.
	• foreach − loops through a block of code for each element in an array

We will discuss about continue and break keywords used to control the loops execution.
The for loop statement
The for statement is used when you know how many times you want to execute a statement or a block of statements.
Syntax
for (initialization; condition; increment){
   code to be executed;
}
The initializer is used to set the start value for the counter of the number of loop iterations.
A variable may be declared here for this purpose and it is traditional to name it $i.
Example
The following example makes five iterations and changes the assigned value of two variables on each pass of the loop

 */

$a = 0;
$b = 0;

for( $i = 0; $i<5; $i++ ) {
    $a += 10;
    $b += 5;
}

echo ("At the end of the loop a = $a and b = $b" );
?>

</body>
</html>


