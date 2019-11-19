<?php
// include the person class script
include "includes/person.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>

<?php

// inheritance the person class
$person1 = new Person();
// calling the method setName and set Property $person1
$person1->setName("Phil");
// echo out the property
echo $person1->name;

$person2 = new Person();
// calling the method setName and set Property $person2
$person2->setName("Frank");
// echo out the property
echo $person2->name;

  ?>

</body>
</html>