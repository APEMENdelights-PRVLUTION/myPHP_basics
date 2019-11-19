<?php

/*
 * PHP-Variablen

In PHP beginnt eine Variable mit dem Zeichen $, gefolgt vom Namen der Variablen:
Nach der Ausführung der obigen Anweisungen hält die Variable $txt den Wert Hello world!,
die Variable $x den Wert 5 und die Variable $y den Wert 10,5.

Hinweis: Wenn Du einer Variablen einen Textwert zuweist, setze Anführungszeichen um den Wert.
Hinweis: Im Gegensatz zu anderen Programmiersprachen hat PHP keinen Befehl zum Deklarieren einer
Variablen. Es wird in dem Moment erstellt, in dem Sie ihm zum ersten Mal einen Wert zuweisen.

Stell dir Variablen als Container zum Speichern von Daten vor.
Eine Variable kann einen kurzen Namen (wie x und y) oder einen beschreibenden Namen (Alter, Fahrzeugname, total_volume) haben.

Regeln für PHP-Variablen:
Eine Variable beginnt mit dem Zeichen $, gefolgt vom Namen der Variablen.
Ein Variablenname muss mit einem Buchstaben oder dem Unterstrichzeichen beginnen.
Ein Variablenname darf nicht mit einer Zahl beginnen.
Ein Variablenname darf nur alphanumerische Zeichen und Unterstriche (A-z, 0-9 und _) enthalten.
Variablennamen sind case-sensitive ($age und $AGE sind zwei verschiedene Variablen).
Denke daran, dass PHP-Variablennamen zwischen Groß- und Kleinschreibung unterscheiden!

*/
echo "<h2>Einfache variable in einem Textsegment</h2>";
$txt1 = "programming in php";
echo "I love " . $txt1 . "!";
?>

<?php
echo "<h2>Einfache addition mit zwei variablen</h2>";
echo "Ind diesem Bsp x = 5 und y = 4 der operator ist + <br>";
$x = 5;
$y = 4;
echo $x + $y;
?>


