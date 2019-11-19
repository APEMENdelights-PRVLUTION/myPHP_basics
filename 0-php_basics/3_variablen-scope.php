<?php

/*
 * PHP ist eine lose eingegebene Sprache.
Im obigen Beispiel ist zu beachten, dass wir PHP nicht sagen mussten, welcher Datentyp die Variable ist.
PHP weist der Variablen automatisch einen Datentyp zu, abhängig von ihrem Wert. Da die Datentypen nicht im
engeren Sinne gesetzt sind, kann man z.B. eine Zeichenkette zu einer ganzen Zahl hinzufügen,
ohne einen Fehler zu verursachen.

In PHP 7 wurden Typdeklarationen hinzugefügt. Dies gibt die Möglichkeit, den Datentyp anzugeben,
der bei der Deklaration einer Funktion erwartet wird, und durch die Aktivierung der strengen Anforderung wird
bei einer Typinkongruenz ein "Fatal Error" ausgelöst.

Mehr über strict und nicht non-strict Anforderungen und Datentypdeklarationen erfahren Sie im Kapitel PHP-Funktionen.

PHP-Variables Scope
In PHP können Variablen an beliebiger Stelle im Skript deklariert werden.
Der Umfang einer Variablen ist der Teil des Skripts, in dem die Variable referenziert/verwendet werden kann.

PHP hat drei verschiedene Variablenbereiche:

- lokal
- global
- statisch

*/
$x = 5; // global scope
echo "<h2>Global scope außerhalb von funktionen angegeben</h2>";

function globalScope() {
    // using x inside this function will generate an error
    echo "<p>Variable x in dieser function ist: $x</p>";
}
globalScope();

echo "<p>Variable x außerhalb der function ist: $x</p>";
?>

<?php
echo "<h2>Local scope innerhalb von funktionen angegeben</h2>";

function localScope() {
    $x = 5; // local scope
    echo "<p>Variable x inside function is: $x</p>";
}
localScope();

// using x outside the function will generate an error
echo "<p>Variable x outside function is: $x</p>";
?>


<?php
/*
 * PHP Das statische Schlüsselwort
Normalerweise, wenn eine Funktion abgeschlossen/ausgeführt wird, werden alle ihre Variablen gelöscht.
Manchmal möchten wir jedoch, dass eine lokale Variable NICHT gelöscht wird. Wir brauchen es für einen weiteren Job.

Verwende dazu das "static" Schlüsselwort, wenn du die Variable zum ersten Mal deklarierst:
 */

function staticScope() {
    static $x = 0;
    echo $x;
    $x++;
}

staticScope();
staticScope();
staticScope();

?>