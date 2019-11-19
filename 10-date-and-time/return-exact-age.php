<!DOCTYPE html>
<html>
<body>

<?php
// Here is a simple PHP function that returns the exact age of a person given his/her birthdate:
// The function is used with a call like this:
age(2,1,1979);

function age($month, $day, $year){
$y = 1979;
$m = 2;
$d = 1;

$age = $y - $year;
if($m <= $month)
{
if($m == $month)
{
if($d < $day) $age = $age - 1;
}
else $age = $age - 1;
}
return($age);
}

?>


