<html>
<body>

<?php

/*
 *The while loop statement
The while statement will execute a block of code if and as long as a test expression is true.
If the test expression is true then the code block will be executed. After the code has executed
the test expression will again be evaluated and the loop will continue until the test expression is found to be false.
Syntax
while (condition) {
   code to be executed;
}
Example
This example decrements a variable value on each iteration of the loop and the counter increments until
 it reaches 10 when the evaluation is false and the loop ends.
 *
 */

$i = 0;
$num = 50;

while( $i < 10) {
    $num--;
    $i++;
}

echo ("Loop stopped at i = $i and num = $num" );
?>

</body>
</html>
