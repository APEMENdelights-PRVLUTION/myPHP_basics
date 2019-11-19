<?php
/*
Ein PHP-Skript wird auf dem Server ausgeführt, und das reine HTML-Ergebnis wird an den Browser zurückgegeben.

Grundlegende PHP-Syntax
Ein PHP-Skript kann an beliebiger Stelle im Dokument platziert werden.

Ein PHP-Skript beginnt mit <?php und endet mit ?>
Die Standard-Dateierweiterung für PHP-Dateien ist ".php".

Eine PHP-Datei enthält normalerweise HTML-Tags und etwas PHP-Skripting-Code.
Unten haben wir ein Beispiel für eine einfache PHP-Datei mit einem PHP-Skript,
das eine eingebaute PHP-Funktion "echo" verwendet, um den Text "Hello World!" auf einer Webseite auszugeben:

*/
?>
<!DOCTYPE html>
<html>
<body>

<h1>BASIC SYNTAX PHP</h1>

<?php
echo "Hello World!";
?>



<?php
/*
In PHP sind WEDER KEYWORDS (z.B. if, else, while, echo, etc.), NOCH Klassen, Funktionen und
benutzerdefinierte Funktionen case-sensitive.

Im folgenden Beispiel sind alle drei folgenden Echoanweisungen gleich und legal:
 */
echo "<h2>Case Sensitiveness</h2>";

ECHO "Hello World!<br>";
echo "Hello World!<br>";
EcHo "Hello World!<br>";
?>



<?php
/*
 * Betrachten wir das folgende Beispiel; nur die erste Anweisung zeigt den Wert der Variablen $color an!
 *  Dies liegt daran, dass $color, $COLOR und $coLOR als drei verschiedene Variablen behandelt werden:
 */
$color = "red";
echo "<h2>Variablen</h2>";
echo "My car is " . $color . "<br>";
echo "My house is " . $COLOR . "<br>";
echo "My boat is " . $coLOR . "<br>";
?>


