<html>
<body>

<?php

/*
 *
 * The break statement
The PHP break keyword is used to terminate the execution of a loop prematurely.
The break statement is situated inside the statement block. If gives you full control and whenever you want to exit from the loop you can come out. After coming out of a loop immediate statement to the loop will be executed.
Example
In the following example condition test becomes true when the counter value reaches 3 and loop terminates.
 */
$i = 0;

while( $i < 10) {
    $i++;
    if( $i == 3 )break;
}
echo ("Loop stopped at i = $i" );
?>

</body>
</html>
