<?php
// Define your target date here
	$targetYear  = 2019;
	$targetMonth = 12;
	$targetDay   = 10;
	$targetHour  = 12;
	$targetMinute= 00;
	$targetSecond= 00;
// End target date definition

// Define date format
$dateFormat = "Y-m-d H:i:s";

$targetDate = mktime($targetHour,$targetMinute,$targetSecond,$targetMonth,$targetDay,$targetYear);
$actualDate = time();

$secondsDiff = $targetDate - $actualDate;

$remainingDay     = floor($secondsDiff/60/60/24);
$remainingHour    = floor(($secondsDiff-($remainingDay*60*60*24))/60/60);
$remainingMinutes = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))/60);
$remainingSeconds = floor(($secondsDiff-($remainingDay*60*60*24)-($remainingHour*60*60))-($remainingMinutes*60));

$targetDateDisplay = date($dateFormat,$targetDate);
$actualDateDisplay = date($dateFormat,$actualDate);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>SimpleCountDown</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
      <div class="caption">SIMPLE COUNTDOWN</div>
      <div id="icon">&nbsp;</div>
      <div class="result">
      	 TARGET DATE: <?php echo $targetDateDisplay; ?><br/><br/>
      	 ACTUAL DATE: <?php echo $actualDateDisplay; ?>
      </div>
      <div class="caption">REMAINING</div>
      <div class="result">
      	 <?php echo "$remainingDay days, $remainingHour hours, $remainingMinutes minutes, $remainingSeconds seconds";?>
      </div>
    </div>
</body>   
