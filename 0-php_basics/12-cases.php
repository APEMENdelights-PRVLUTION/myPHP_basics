<?php
$number = "10";
echo "Die Zahl $number heißt ausgeschrieben: ";
switch ($number) {
    case 2:
    case 3:
    case 5:
        echo 'Die Zahl ist eine Primzahl.';
        break;
    case 1:
    case 4:
        echo 'Die Zahl ist keine Primzahl.';
        break;
    default:
        echo 'Ungültiger Wert';
}
?>