<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>

<?php
include "includes/person.inc.php";
$pet01 = new Pet();
echo $pet01->owner();
?>

</body>
</html>