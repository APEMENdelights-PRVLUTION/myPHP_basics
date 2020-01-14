<?php
// include the person class script
include "includes/newclass.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>

<?php
    $object = new NewClass;
    // calling the destructor
    unset($object);
    echo $object->getProperty();
?>

</body>
</html>