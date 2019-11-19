<?php
#include header for layout
include './incl/header.php';
#Create connection to SQL with PDO
include './conf/conn-pdo.php';
?>
</head>
<body >
<?php

include './incl/menue.php';
?>


<?php
session_start();
echo "<b>Insert data to db using a form</b><br><br>";
?>

<div class="form-tut">
<form action="insert.php" method="post">
  <p>COUNTRY:<input name="country" type="text"></p>
  <p>CAPITAL:<input name="capital" type="text"></p>
  <p>CONTINENT:<input name="continent" type="text" ></p>
  <input type="submit" class="button">
</form>
</div>


<?php
#queries
$sql = "SELECT * FROM countries";
foreach ($pdo->query($sql) as $row) {
    echo $row['country']."<br>";
    echo $row['capital']."<br>";
    echo $row['continent']."<br><br>";
}
?>

