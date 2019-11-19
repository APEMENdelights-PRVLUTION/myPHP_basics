<?php
//Here’s a simple function that calculates the number of days between two dates.

//day's seconds = 86400
function days_between($day_i,$month_i,$year_i,$day_f,$month_f,$year_f){
    $days_in_between = (mktime(0,0,0,$month_f,$day_f,$year_f) - mktime(0,0,0,$month_i,$day_i,$year_i))/86400;
    return $days_in_between;
}
echo days_between(21, 8, 2019, 1, 9, 2019);

// If we want to calculate the days between 21/8/2009 and 1/9/2009 then
// would give us 11
?>
