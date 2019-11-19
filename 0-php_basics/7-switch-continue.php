<html>
<body>

<?php
/*
 * The continue statement
The PHP continue keyword is used to halt the current iteration of a loop but it does not terminate the loop.
Just like the break statement the continue statement is situated inside the statement block containing the code
that the loop executes, preceded by a conditional test. For the pass encountering continue statement, rest of the
loop code is skipped and next pass starts.
Example
In the following example loop prints the value of array but for which condition becomes true it just skip the code and
 next value is printed.
 */

$array = array( 1, 2, 3, 4, 5);

foreach( $array as $value ) {
    if( $value == 3 )continue;
    echo "Value is $value <br />";
}
?>

</body>
</html>
