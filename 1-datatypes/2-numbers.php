<?php

/*
Here are some rules for integers:

An integer must have at least one digit
An integer must not have a decimal point
An integer can be either positive or negative
Integers can be specified in three formats: decimal (10-based), hexadecimal (16-based - prefixed with 0x) or octal (8-based - prefixed with 0)

PHP has the following functions to check if the type of a variable is integer:

is_int()
is_integer() - alias of is_int()
is_long() - alias of is_int()
 */

echo ("<h3>x equals 5985 which is an integer number:</h3>");
$x = 5985;
var_dump($x);

?>


<?php
echo ("<h3>is_int - Check if the type of a variable is integer:</h3>");
$x = 5985;
var_dump(is_int($x));

$x = 59.85;
var_dump(is_int($x));
?>


<?php
/*
 *PHP Floats
A float is a number with a decimal point or a number in exponential form.

2.0, 256.4, 10.358, 7.64E+5, 5.56E-5 are all floats.

The float data type can commonly store a value up to 1.7976931348623E+308 (platform dependent), and have a maximum precision of 14 digits.

PHP has the following functions to check if the type of a variable is float:

is_float()
is_double() - alias of is_float()
 *
 *
 */

echo ("<h3>is_float() - check if the type of a variable is float:</h3>");
$x = 10.365;
var_dump(is_float($x));
?>
<?php

/*PHP Infinity
A numeric value that is larger than PHP_FLOAT_MAX is considered infinite.

PHP has the following functions to check if a numeric value is finite or infinite:

is_finite()
is_infinite()
However, the PHP var_dump() function returns the data type and value:
 *
 */

echo ("<h3>is_finite() - Replace Text Within a String</h3>");
$x = 1.9e411;
var_dump(is_finite($x));
var_dump(is_infinite($x));


/*
 *
 *
 *
 */


echo ("<h3>str_replace() - Replace Text Within a String</h3>");


/*
 *
 *
 *
 */




/*
 *
 *
 *
 */




/*
 *
 *
 *
 */



