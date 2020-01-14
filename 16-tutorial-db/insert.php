<?php
include "./incl/header.php";


?>
</head>
<body>

<?php
include_once "./conf/conn-pdo.php";

#Variables
$country = $_POST["country"];
$capital = $_POST["capital"];
$continent = $_POST["continent"];

try {
  #$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  #SQL Insert
  $sql = "INSERT INTO tasks (country, capital, continent) VALUES ('$country', '$capital', '$continent' )";
  # use exec() because no results are returned
  $pdo -> exec($sql);
  echo "Your submission have been inserted";
}
catch(PDOException $e){
  echo $sql . "<br>" . $e -> getMessage();
}
?>

