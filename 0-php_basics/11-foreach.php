<html>
<body>

<?php
/*
 * The foreach loop statement
The foreach statement is used to loop through arrays. For each pass the
value of the current array element is assigned to $value and the array pointer is
 moved by one and in the next pass next element will be processed.
Syntax
foreach (array as value) {
   code to be executed;
}
Example
Try out following example to list out the values of an array.

 */

$array = array( 1, 2, 3, 4, 5);

foreach( $array as $value ) {
    echo "Value is $value <br />";
}
?>

</body>
</html>
