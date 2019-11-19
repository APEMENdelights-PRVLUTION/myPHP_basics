<!DOCTYPE html>
<html>
<body>

<?php
$timezone = "Europe/Berlin";
echo "Your Timezone is ". " $timezone <br>";
date_default_timezone_set("$timezone");
echo "The time is " . date("h:i:sa");

?>

</body>
</html>
