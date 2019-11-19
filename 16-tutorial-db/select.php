<?php
#include header for layout
include './incl/header.php';
#Create connection to SQL with PDO
include './conf/conn-pdo.php';
?>
</head>
<body >
<?php
#queries
$sql = "SELECT * FROM countries";
foreach ($pdo->query($sql) as $row) {
   echo $row['country']."<br>";
   echo $row['capital']."<br>";
   echo $row['continent']."<br><br>";
}
?>

<?php
#include header for layout
include "./incl/footer";