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
// inheritance the person class and
//  because we are having a constructor we'll need to declare properties
$person1 = new Person("Phil", "Brown", 32);
// even thou my properties are set for private i can call my public function getName to print
echo $person1->getName();

?>

</body>
</html>