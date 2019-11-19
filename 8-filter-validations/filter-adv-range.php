<!DOCTYPE html>
<html>
<body>

<?php

/*
 * Validate an Integer Within a Range
The following example uses the filter_var() function to check if a variable is both of type INT, and between 1 and 200:
 *
 *
 */
/* variable to check */
$int = 122;

/* min value */
$min = 1;
/* max value */
$max = 200;

if (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
    echo("Variable value is not within the legal range");
} else {
    echo("Variable value is within the legal range");
}
?>

</body>
</html>
