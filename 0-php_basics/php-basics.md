#PHP Basics

PHP ist eine Server-Skriptsprache und ein leistungsstarkes Werkzeug zur Erstellung 
dynamischer und interaktiver Webseiten. PHP ist eine weit verbreitete, kostenlose und 
effiziente Alternative zu Wettbewerbern wie dem ASP von Microsoft.

PHP 7 ist die neueste stabile Version.

Ein PHP-Skript wird auf dem Server ausgeführt, und das reine HTML-Ergebnis wird an den Browser zurückgegeben.

##Grundlegende PHP-Syntax
Ein PHP-Skript kann an beliebiger Stelle im Dokument platziert werden.

Ein PHP-Skript beginnt mit <?php und endet mit ?>
Die Standard-Dateierweiterung für PHP-Dateien ist ".php".

Eine PHP-Datei enthält normalerweise HTML-Tags und etwas PHP-Skripting-Code.

##Non case sensitive
In PHP sind WEDER KEYWORDS (z.B. if, else, while, echo, etc.), NOCH Klassen, Funktionen und
benutzerdefinierte Funktionen case-sensitive. Variablen hingegen sind immer case-sensitive



#PHP-Variablen
 
 In PHP beginnt eine Variable mit dem Zeichen $, gefolgt vom Namen der Variablen:
 Nach der Ausführung der obigen Anweisungen hält die Variable $txt den Wert Hello world!,
 die Variable $x den Wert 5 und die Variable $y den Wert 10,5.
 
 #### Hinweis: 
 Wenn Du einer Variablen einen Textwert zuweist, setze Anführungszeichen um den Wert.
 #### Hinweis: 
 Im Gegensatz zu anderen Programmiersprachen hat PHP keinen Befehl zum Deklarieren einer
 Variablen. Es wird in dem Moment erstellt, in dem Sie ihm zum ersten Mal einen Wert zuweisen.
 
 ### Stell dir Variablen als Container zum Speichern von Daten vor.
 Eine Variable kann einen kurzen Namen (wie x und y) oder einen beschreibenden Namen (Alter, Fahrzeugname, total_volume) haben.
 
 ##Regeln für PHP-Variablen:
- Eine Variable beginnt mit dem Zeichen $, gefolgt vom Namen der Variablen.
- Ein Variablenname muss mit einem Buchstaben oder dem Unterstrichzeichen beginnen.
- Ein Variablenname darf nicht mit einer Zahl beginnen.
- Ein Variablenname darf nur alphanumerische Zeichen und Unterstriche (A-z, 0-9 und _) enthalten.
- Variablennamen sind case-sensitive ($age und $AGE sind zwei verschiedene Variablen).
- Denke daran, dass PHP-Variablennamen zwischen Groß- und Kleinschreibung unterscheiden!

# PHP ist eine lose eingegebene Sprache.
  Im Beispiel ist zu beachten, dass wir PHP nicht sagen mussten, welcher Datentyp die Variable ist.
  PHP weist der Variablen automatisch einen Datentyp zu, abhängig von ihrem Wert. Da die Datentypen nicht im
  engeren Sinne gesetzt sind, kann man z.B. eine Zeichenkette zu einer ganzen Zahl hinzufügen,
  ohne einen Fehler zu verursachen.
  
  In PHP 7 wurden Typdeklarationen hinzugefügt. Dies gibt die Möglichkeit, den Datentyp anzugeben,
  der bei der Deklaration einer Funktion erwartet wird, und durch die Aktivierung der strengen Anforderung wird
  bei einer Typinkongruenz ein "Fatal Error" ausgelöst.
  
  Mehr über strict und nicht non-strict Anforderungen und Datentypdeklarationen erfahren Sie im Kapitel PHP-Funktionen.
  
# PHP-Variables Scope
  In PHP können Variablen an beliebiger Stelle im Skript deklariert werden.
  Der Umfang einer Variablen ist der Teil des Skripts, in dem die Variable referenziert/verwendet werden kann.
  
  ## PHP hat drei verschiedene Variablenbereiche:
  
  - lokal
  - global
  - statisch

## Konstanten

Eine Konstante ist ein Name oder ein Bezeichner für einen einfachen Wert. Ein konstanter Wert kann sich während der Ausführung des Skripts nicht ändern. Standardmäßig wird bei einer Konstanten zwischen Groß- und Kleinschreibung unterschieden. Konventionell sind Konstantenbezeichner immer in Großbuchstaben geschrieben. Ein konstanter Name beginnt mit einem Buchstaben oder Unterstrich, gefolgt von einer beliebigen Anzahl von Buchstaben, Zahlen oder Unterstrichen. Wenn du eine Konstante definiert hast, kann sie nie geändert oder undefiniert werden.
Um eine Konstante zu definieren, müssen Sie die Funktion define() verwenden und um den Wert einer Konstanten abzurufen, müssen Sie nur ihren Namen angeben. Im Gegensatz zu Variablen müssen Sie keine Konstante mit einem $ haben. Sie können auch die Funktion constant() verwenden, um den Wert einer Konstanten zu lesen, wenn Sie den Namen der Konstanten dynamisch erhalten möchten.
konstante() Funktion

Wie der Name schon sagt, gibt diese Funktion den Wert der Konstanten zurück.
Dies ist nützlich, wenn Sie den Wert einer Konstanten abrufen möchten, aber ihren Namen nicht kennen, d.h. sie wird in einer Variablen gespeichert oder von einer Funktion zurückgegeben.
constant() 

Beispiel
````
<?php
   define("MINSIZE", 50);
   
   echo MINSIZE;
   echo constant("MINSIZE"); // gleiche Sache wie die vorherige Zeile
?>
````

Nur skalare Daten (boolesch, integer, float und string) können in Konstanten enthalten sein.

Unterschiede zwischen Konstanten und Variablen sind
	- Es besteht keine Notwendigkeit, ein Dollarzeichen ($) vor eine Konstante zu schreiben,
	  wobei man wie in Variable ein Dollarzeichen schreiben muss.
	- Konstanten können nicht durch einfache Zuweisung definiert werden, 
	  sie können nur mit der Funktion define() definiert werden.
	- Konstanten können überall definiert und zugegriffen werden, ohne Rücksicht auf variable Scoping-Regeln.
	- Sobald die Konstanten eingestellt sind, dürfen sie nicht mehr neu definiert oder undefiniert werden.
	
### Gültige und ungültige Konstantennamen

#### Gültige Konstantennamen

```
define("ONE", "first thing");
define("TWO2", "zweite Sache");
define("THREE_3", "dritte Sache");
```
#### Ungültige Konstantennamen

```
define("2TWO", "zweite Sache");
define("__THREE__", "dritter Wert"); 
```

### PHP Magic-Konstanten
PHP stellt eine große Anzahl von vordefinierten Konstanten für jedes Skript zur Verfügung, das es ausführt.
Es gibt fünf magische Konstanten, die sich je nachdem, wo sie verwendet werden, ändern. 
Der Wert von __LINE__ hängt beispielsweise von der Zeile ab, in der er in Ihrem Skript verwendet wird. 
Diese speziellen Konstanten sind case-insensitive und lauten wie folgt - 
Ein paar "magische" PHP-Konstanten aßen wie unten angegeben -

````
Sr.No	Name & Description
1	__LINE__
Die aktuelle Zeilennummer der Datei.
2	__FILE__
	Der vollständige Pfad und Dateiname der Datei. Bei Verwendung innerhalb eines Includes wird der Name der 
    eingebundenen Datei zurückgegeben. Seit PHP 4.0.2 enthält __FILE__ immer einen absoluten Pfad, während es in älteren Versionen unter Umständen einen relativen Pfad enthält.

3	__FUNCTION__
	Der Name der Funktion. (Hinzugefügt in PHP 4.3.0) Ab PHP 5 gibt diese Konstante den Funktionsnamen zurück, 
    wie er deklariert wurde (Groß-/Kleinschreibung beachten). In PHP 4 ist sein Wert immer klein geschrieben.

4	__CLASS__
	Der Klassenname. (Hinzugefügt in PHP 4.3.0) Ab PHP 5 gibt diese Konstante den Klassennamen zurück, 
    wie er deklariert wurde (Groß-/Kleinschreibung beachten). In PHP 4 ist sein Wert immer klein geschrieben.

5	__METHOD__
	Der Name der Klassenmethode. (Hinzugefügt in PHP 5.0.0) Der Methodenname wird so zurückgegeben,
    wie er deklariert wurde (Groß-/Kleinschreibung beachten).

````

##Variablen-Typen
Der Hauptweg, Informationen in der Mitte eines PHP-Programms zu speichern, ist die Verwendung einer Variablen.
Hier sind die wichtigsten Dinge, die Sie über Variablen in PHP wissen sollten.

	- Alle Variablen in PHP sind mit einem führenden Dollarzeichen ($) gekennzeichnet.
	- Der Wert einer Variablen ist der Wert ihrer letzten Zuweisung.
	- Variablen werden mit dem Operator = zugewiesen, mit der Variablen auf der linken Seite und dem auszuwertenden Ausdruck auf der rechten Seite.
	- Variablen können, müssen aber nicht vor der Zuweisung deklariert werden.
	- Variablen in PHP haben keine intrinsischen Typen - eine Variable weiß nicht im Voraus, ob sie zum Speichern einer Zahl oder einer Zeichenkette verwendet wird.
	- Variablen, die vor der Zuweisung verwendet werden, haben Standardwerte.
	- PHP leistet gute Arbeit, indem es bei Bedarf automatisch Typen von einem Typ in einen anderen konvertiert.
	- PHP-Variablen sind Perl-ähnlich.
	
PHP hat insgesamt acht Datentypen, die wir verwenden, um unsere Variablen zu konstruieren 

	- Ganzzahlen - sind ganze Zahlen, ohne Dezimalpunkt, wie 4195.
	- Doubles - sind Gleitkommazahlen, wie 3.14159 oder 49.1.
	- Booleans - haben nur zwei mögliche Werte, entweder true oder false.
	- NULL - ist ein spezieller Typ, der nur einen Wert hat: NULL.
	- Zeichenketten - sind Zeichenfolgen, wie z.B.'PHP unterstützt Zeichenkettenoperationen'.
	- Arrays - sind benannte und indizierte Sammlungen anderer Werte.
	- Objekte - sind Instanzen von vom Programmierer definierten Klassen, die sowohl andere Arten von Werten als auch klassenspezifische Funktionen verpacken können.
	- Ressourcen - sind spezielle Variablen, die Referenzen auf Ressourcen außerhalb von PHP enthalten (z.B. Datenbankverbindungen).
	
Die ersten fünf sind einfache Typen, und die nächsten beiden (Arrays und Objekte) sind zusammengesetzt - 
die zusammengesetzten Typen können andere beliebige Werte beliebigen Typs verpacken, während die einfachen Typen 
dies nicht können. In diesen Kapiteln werden wir nur den einfachen Datentyp erläutern. Array und Objekte werden 
separat erläutert.

### INTEGERS
Es sind ganze Zahlen, ohne Dezimalpunkt, wie 4195. Sie sind der einfachste Typ. Sie entsprechen einfachen 
ganzen Zahlen, sowohl positiven als auch negativen. Ganzzahlen können Variablen zugewiesen werden, oder sie 
können in Ausdrücken verwendet werden, wie zum Beispiel -

$int_var = 12345;
$another_int = -12345 + 12345;

Ganzzahlen können im dezimalen (Basis 10), oktalen (Basis 8) und hexadezimalen (Basis 16) Format vorliegen. 
Dezimalformat ist der Standard, oktale Ganzzahlen werden mit einer führenden 0 angegeben, und Hexadezimale 
haben ein führendes 0x.
Für die meisten gängigen Plattformen ist die größte ganze Zahl 
(2**31 . 1) (oder 2.147.483.647) und die kleinste (negativste) ganze Zahl ist . (2**31 . 1) (oder .2.147.483.647).

### DOUBLE
 3.14159 oder 49.1. Standardmäßig wird der Druck mit der minimalen Anzahl von Dezimalstellen verdoppelt.
  Zum Beispiel der Code 
````
<?php
   $many = 2.28888888800;
   $many_2 = 2.211121200;
   $few = $many + $many_2;
   
   print("$many + $many_2 = $few <br>");
?>
````
Es erzeugt die folgende Browserausgabe -
2.28888 + 2.21112 = 4.5

##BOOLEAN
Booleans haben nur zwei mögliche Werte, entweder wahr oder falsch. PHP stellt eine Reihe von Konstanten zur Verfügung, die speziell für die Verwendung als Booleans gedacht sind: TRUE und FALSE, die so verwendet werden können -
wenn (WAHR) print("Dadurch wird immer gedruckt<br>");
sonst print("Dies wird niemals drucken<br>");

## Interpretieren anderer Typen als Booleans
Hier sind die Regeln zum Bestimmen der "Wahrheit" eines beliebigen Wertes, der nicht bereits vom Typ Boolean ist -
	- Wenn der Wert eine Zahl ist, ist er falsch, wenn er genau gleich Null ist und ansonsten wahr.
	- Wenn der Wert eine Zeichenkette ist, ist es falsch, wenn die Zeichenkette leer ist (null Zeichen hat) oder die Zeichenkette "0" ist, und ansonsten wahr ist.
	- Werte vom Typ NULL sind immer falsch.
	- Wenn der Wert ein Array ist, ist er falsch, wenn er keine anderen Werte enthält, und andernfalls ist er wahr. Für ein Objekt bedeutet das Enthalten eines Wertes, dass eine Member-Variable vorhanden ist, der ein Wert zugewiesen wurde.
	- Gültige Ressourcen sind wahr (obwohl einige Funktionen, die Ressourcen zurückgeben, wenn sie erfolgreich sind, FALSE zurückgeben, wenn sie erfolglos sind).
	- Verwende nicht doppelt als Booleans.
	
Jede der folgenden Variablen hat den Wahrheitswert in ihrem Namen eingebettet, 
wenn sie in einem booleschen Kontext verwendet wird.

```
$true_num = 3 + 0.14159;
$true_str = "Bewährt und wahr".
$true_array[49] = "Ein Array-Element";
$false_array = array();
$false_null = NULL;
$false_num = 999 bis 999;
$false_str = "";
```


## NULL
NULL ist ein spezieller Typ, der nur einen Wert hat: NULL. Um einer Variablen den NULL-Wert zu geben, 
weisen Sie sie einfach wie folgt zu 

````
$my_var = NULL;
Die spezielle Konstante NULL wird durch Konvention großgeschrieben, aber eigentlich ist sie unabhängig von Groß- und Kleinschreibung; man hätte genauso gut -
$my_var = null;

````

Eine Variable, der NULL zugewiesen wurde, hat folgende Eigenschaften -
	- Es wird in einem booleschen Kontext als FALSE ausgewertet.
	- Es gibt FALSE zurück, wenn es mit dem IsSet() Befehl getestet wird.
	
	
## STRINGS
STRINGS sind Zeichenfolgen, wie "PHP unterstützt Zeichenkettenoperationen". Nachfolgend finden Sie gültige Beispiele für Zeichenketten

````
$string_1 = "Dies ist eine Zeichenkette in doppelten Anführungszeichen";
$string_2 = 'Dies ist eine etwas längere, einfach in Anführungszeichen gesetzte Zeichenkette';
$string_39 = "Diese Zeichenkette hat neununddreißig Zeichen";
$string_0 = ""; // eine Zeichenkette mit Null Zeichen

````
Einfach angeführte Zeichenketten werden fast wörtlich behandelt, während doppelt angeführte Zeichenketten Variablen durch ihre Werte ersetzen und bestimmte Zeichenfolgen speziell interpretieren.

````
<?php
   $Variable = "Name";
   $literally ='Meine $Variable wird nicht gedruckt';
   
   print($literally);
   drucken "<br>";
   
   $literally = "Meine $Variable wird gedruckt!";
   print($literally);
?>

````
Dies führt zu folgendem Ergebnis -
Meine $Variable wird nicht gedruckt!\n
Mein Name wird gedruckt

Es gibt keine künstlichen Grenzen für die Länge der Zeichenketten - im Rahmen des verfügbaren Speichers sollten 
Sie in der Lage sein, beliebig lange Zeichenketten herzustellen. STRINGS, die durch doppelte Anführungszeichen 
begrenzt sind (wie in "dies"), werden von PHP auf die beiden folgenden beiden Arten vorverarbeitet:

	- Bestimmte Zeichenfolgen, die mit Backslash (\) beginnen, werden durch Sonderzeichen ersetzt.
	- Variablennamen (beginnend mit $) werden durch Zeichenkettendarstellungen ihrer Werte ersetzt.
	
Die Ersetzungen der Escape-Sequenz sind 

	- \n wird durch das Zeilenumbruchzeichen ersetzt.
	- \r wird durch das Carriage-Return-Zeichen ersetzt.
	- \t wird durch das Tabulatorzeichen ersetzt.
	- \$ wird durch das Dollarzeichen selbst ersetzt ($).
	- \" wird durch ein einziges doppeltes Anführungszeichen (") ersetzt.
	- wird durch einen einzelnen Backslash (\\) ersetzt.
	
##Here Document
Sie können einer einzelnen Zeichenkettenvariablen mehrere Zeilen zuweisen, indem Sie hier Dokument 

````
<?php
   $channel =<<<<<<_XML__XML_
   
   <channel>
      <title>What's For Dinner</title>>Was ist das?
      <link>http://menu.example.com/ </link>
      <Beschreibung>Wählen Sie heute Abend, was Sie essen möchten.
   </channel>
_XML_;
   
   echo <<<<<<END
   Dabei wird die Syntax "Hier-Dokument" verwendet, um mehrere Zeilen mit einer Variablen auszugeben. 
   Interpolation. Beachten Sie, dass der hier verwendete Dokument-Terminator in einer Zeile mit 
   Nur ein Semikolon. Kein zusätzlicher Leerraum!
   
END;
   
   print $channel;
?>

````

Dies führt zu folgendem Ergebnis -
Dabei wird die Syntax "here document" für die Ausgabe verwendet.
mehrere Zeilen mit variabler Interpolation. Hinweis
dass der hier verwendete Dokument-Terminator auf einem
Zeile mit nur einem Semikolon. Kein zusätzlicher Leerraum!

````
<channel>
<title>What's For Dinner<title>Title>Was ist das?
<link>http://menu.example.com/<link>link>
<Beschreibung>Wählen Sie heute Abend, was Sie essen möchten.

````

Variabler Umfang
Der Umfang kann definiert werden als der Bereich der Verfügbarkeit, den eine Variable für das Programm hat, in dem sie deklariert wird. PHP-Variablen können eine von vier Scope-Arten sein -
Lokale Variablen
Eine in einer Funktion deklarierte Variable gilt als lokal, d.h. sie kann ausschließlich in dieser Funktion referenziert werden. Jede Zuweisung außerhalb dieser Funktion wird als eine völlig andere Variable betrachtet als die in der Funktion enthaltene -

````
<?php
   $x = 4;
   
   Funktion assignx () {) { 
      $x = 0;
      print "\$x inside function is $x. <br />";
   }
   
   assignx();
   print "\$x außerhalb der Funktion ist $x. <br />";
?>

````
Dies führt zu folgendem Ergebnis -
Die Funktion $x inside ist 0. 
$x außerhalb der Funktion ist 4. 
Funktionsparameter
Funktionsparameter werden nach dem Funktionsnamen und in Klammern angegeben. Sie werden so deklariert, wie es eine typische Variable wäre -

````
<?php
   // multipliziert einen Wert mit 10 und gibt ihn an den Aufrufer zurück.
   Funktion multiplizieren ($Wert) {
      $value = $value * 10;
      gibt $value zurück;
   }
   
   $retval = multiplizieren (10);
   Drucken "Rückgabewert ist $retval\n";
?>

````

Dies führt zu folgendem Ergebnis -
Der Rückgabewert ist 100

Globale Variablen
Im Gegensatz zu lokalen Variablen kann in jedem Teil des Programms auf eine globale Variable zugegriffen werden. 
Um jedoch geändert zu werden, muss eine globale Variable in der Funktion, in der sie geändert werden soll,
explizit als global deklariert werden. Dies geschieht bequemerweise, indem Sie das Schlüsselwort GLOBAL 
vor die Variable setzen, die als global erkannt werden soll. Das Platzieren dieses Schlüsselwortes vor einer bereits vorhandenen Variable weist PHP an, die Variable mit diesem Namen zu verwenden. Betrachten Sie ein Beispiel -

````
<?php
   $somevar = 15;
   
   Funktion addit() {) {
      GLOBAL $somevar;
      $somevar++;
      
      drucken Sie "Somevar ist $somevar";
   }
   
   addit();
?>

````

Dies führt zu folgendem Ergebnis -
Somevar ist 16 Jahre alt.
Statische Variablen
Die letzte Art des Variablenumfangs, die ich bespreche, ist bekannt als statisch. Im Gegensatz zu den als 
Funktionsparameter deklarierten Variablen, die zerstörerisch sind.