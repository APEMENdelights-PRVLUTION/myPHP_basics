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

// echo Person::$drinkingAge;
// Person::setDrinkingAge(18);
// echo Person::$drinkingAge;

$person1 = new Person("Phil", "Brown", 32);
echo $person1->getDA();

?>

</body>
</html>