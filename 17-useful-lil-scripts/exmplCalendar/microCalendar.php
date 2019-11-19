<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Micro Calendar</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<?php
function showCalendar(){
    // Get key day informations. 
    // We need the first and last day of the month and the actual day
	$today    = getdate();
	$firstDay = getdate(mktime(0,0,0,$today['mon'],1,$today['year']));
	$lastDay  = getdate(mktime(0,0,0,$today['mon']+1,0,$today['year']));
	
	
	// Create a table with the necessary header informations
	echo '<table>';
	echo '  <tr><th colspan="7">'.$today['month']." - ".$today['year']."</th></tr>";
	echo '<tr class="days">';
	echo '  <td>Mo</td><td>Tu</td><td>We</td><td>Th</td>';
	echo '  <td>Fr</td><td>Sa</td><td>Su</td></tr>';
	
	
	// Display the first calendar row with correct positioning
	echo '<tr>';
	if ($firstDay['wday'] == 0) $firstDay['wday'] = 7;
	for($i=1;$i<$firstDay['wday'];$i++){
		echo '<td>&nbsp;</td>';
	}
	$actday = 0;
	for($i=$firstDay['wday'];$i<=7;$i++){
		$actday++;
		if ($actday == $today['mday']) {
			$class = ' class="actday"';
		} else {
			$class = '';
		}
		echo "<td$class>$actday</td>";
	}
	echo '</tr>';
	
	//Get how many complete weeks are in the actual month
	$fullWeeks = floor(($lastDay['mday']-$actday)/7);
	
	for ($i=0;$i<$fullWeeks;$i++){
		echo '<tr>';
		for ($j=0;$j<7;$j++){
			$actday++;
			if ($actday == $today['mday']) {
				$class = ' class="actday"';
			} else {
				$class = '';
			}
			echo "<td$class>$actday</td>";
		}
		echo '</tr>';
	}
	
	//Now display the rest of the month
	if ($actday < $lastDay['mday']){
		echo '<tr>';
		
		for ($i=0; $i<7;$i++){
			$actday++;
			if ($actday == $today['mday']) {
				$class = ' class="actday"';
			} else {
				$class = '';
			}
			
			if ($actday <= $lastDay['mday']){
				echo "<td$class>$actday</td>";
			}
			else {
				echo '<td>&nbsp;</td>';
			}
		}
		
		
		echo '</tr>';
	}
	
	echo '</table>';
}

showCalendar();
?>

</body>
</html>