<?php
#include header for layout
include './incl/header.php';
?>
</head>
<body>


<?php
#Create connection to SQL with PDO
include './conf/conn-pdo.php';
#Variables
$country = $_POST["country"];

try {
  $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  #SQL Insert
  $sql = "DELETE FROM countries WHERE country = '$country'";
  # use exec() because no results are returned
  $pdo -> exec($sql);
  echo "Neuer Eintrag erfolgreich gelöscht";
}
catch(PDOException $e){
  echo $sql . "<br>" . $e -> getMessage();
}
$pdo -> null;
?>



<?php
#include header for layout
include "./incl/footer";