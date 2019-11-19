<?php
include 'includes/autoLoader.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>

<?php
//

// echo Person::$drinkingAge;
// Person::setDrinkingAge(18);
// echo Person::$drinkingAge;

$person1 = new Person\Person("Phil", "32");
echo $person1->getPerson();

echo "<br>";

// $house1 = new House("Johndoeroad", 12);
// echo $house1->getAddress();

?>

</body>
</html>