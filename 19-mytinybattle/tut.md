Tutorial

## Schritt 1: Klasse instanzieren

Üblicherweise wird die Klasse zunächst instanziert. Als Parameter werden Kampftyp und ein Boolean für den Zufallseinluss im Angriffs- und Verteidigungswert an den Konstruktor __construct() übergeben.

In dieser Version sind zwei neue Kampftypen dazugekommen. Ich liste also alle drei Möglichkeiten auf:

Duel (Battle::duel)
Ein Kampf zwischen zwei Gegnern. Es gewinnt derjenige, der am Leben bleibt.

Deathmatch (Battle::deathmatch)
Kampf zwischen mehreren Spielern. Kampf endet, sobald die Anzahl der maximal Überlebenden erreicht ist.

Team Deathmatch (Battle::team_deathmatch)
Kampfzwischen mehreren Spielern. Die darin enthaltende Diplomatie Funktion ermöglicht Kämpfe mit mehreren Teams gegeneinander. Auch hier hört der Kampf erst auf, sobald die Anzahl der maximal Überlebenden erreich ist.

Ein sinnvolles Beispiel für die Instanzierung wäre sowas:
````
<?php
$battle = new Battle(Battle::team_deathmatch, true);
```

####Deutung:
Der Kampftyp ist Team Deathmatch und die Angriffs und Verteidigungswerte sind nicht konstant, also mit einem kleinen Zufallseinfluss versehen.

TODO:
Empfehlenswert ist es den Zufallseinfluss zu aktivieren, andernfalls könnte ein Kampf sich zu einer endlosschleife bilden, wenn die Gegner gleichstarke Fähigkeiten haben.[/quote]

### Schritt zwei: Krieger bilden
Um neue Krieger zu erstellen, reicht schon ein Array aus. Die klassenbezogenen Konstanten helfen beim Programmieren, die richtige Fähigkeiten zu setzen.

##Ein Krieger hat 7 optionale Eigenschaften:

Name (Battle::warrior_name)
Standardwert: "Warrior"
Der Name des Kriegers

Gruppe (Battle::warrior_group) (nur im Team Deathmatch Modus benötigt)
Standardwert: null
Das Team, in dem sich der Krieger befindet

Lebenspunkte (Battle::warrior_hp)
Standardwert: 100
Die Lebenspunkte des Kriegers.

Attacke (Battle::warrior_off)
Standardwert: 10
Der normale Angriffswert des Spielers.

Attacke Multiplikator (Battle::warrior_off_m)
Standardwert: 1
Der Multiplikator, mit dem der Angriffswert multipliziert wird. 
Diese Eigenschaft dient hauptsächlich der Balanzierung.

Verteidigung (Battle::warrior_def)
Standardwert: 10
Der normale Verteidigungswert des Spielers.

Verteidigung Multiplikator (Battle::warrior_def_m)
Standardwert: 1
Der Multiplikator, mit dem der Verteidigungswert multipliziert wird. 
Diese Eigenschaft dient hauptsächlich der Balanzierung.

Das vorherige Beispiel wird fortgesetzt:
```
<?php
$battle = new Battle(Battle::team_deathmatch, true);
$warrior1 = array(
   Battle::warrior_name => "Mensch",
   Battle::warrior_group => "Team A",
   Battle::warrior_hp => 50,
   Battle::warrior_off => 10,
   Battle::warrior_off_m => 1.2,
   Battle::warrior_def => 5,
   Battle::warrior_def_m => 1.6
);
$warrior2 = array(
   Battle::warrior_name => "Kobold",
   Battle::warrior_group => "Team A",
   Battle::warrior_hp => 40,
   Battle::warrior_off => 12,
   Battle::warrior_off_m => 1.3,
   Battle::warrior_def => 6,
   Battle::warrior_def_m => 1.5
);
$warrior3 = array(
   Battle::warrior_name => "Elf",
   Battle::warrior_group => "Team B",
   Battle::warrior_hp => 100,
   Battle::warrior_off => 5,
   Battle::warrior_off_m => 1.7,
   Battle::warrior_def => 10,
   Battle::warrior_def_m => 1.6
);
$warrior4 = array(
   Battle::warrior_name => "Zwerg",
   Battle::warrior_group => "Team B",
   Battle::warrior_hp => 30,
   Battle::warrior_off => 30,
   Battle::warrior_off_m => 1.7,
   Battle::warrior_def => 7,
   Battle::warrior_def_m => 1.2
);
$warrior5 = array(
   Battle::warrior_name => "Vampir",
   Battle::warrior_group => "Team C",
   Battle::warrior_hp => 50,
   Battle::warrior_off => 15,
   Battle::warrior_off_m => 1.8,
   Battle::warrior_def => 3,
   Battle::warrior_def_m => 1.1
);
$warrior6 = array(
   Battle::warrior_name => "Drache",
   Battle::warrior_group => "Team C",
   Battle::warrior_hp => 140,
   Battle::warrior_off => 10,
   Battle::warrior_off_m => 1.2,
   Battle::warrior_def => 5,
   Battle::warrior_def_m => 1.6
);

````
[quote]Hinweis:
Die Angriffs und Verteidigungswerte werden nicht automatisch ausbalanziert. Das bedeutet, dass bei einer schlechter Balanzierung es zu vielen Runden kommen kann.
[/quote]
[quote]Tipp:
Je höher die Angriffswerte und je kleiner die Lebenspunkte, desto kürzere Logs.
[/quote]

Schritt drei: Krieger hinzufügen und Diplomatie zuordnen

Nachdem die Instanzierung durchgeführt worden ist, und die Krieger erstellt wurden, folgt nun die Einstellung des Kampfes.

Grundsätzlich werden Krieger über die funktion $battle->add_warrior() hinzugefügt. Wenn aber der Modus Team Deathmatch verwendet wird, wie in diesem Fall, müssen die Krieger in Gruppen zugeordnet werden.

Über die Methode ->add_group() erstellt man ein neues Team und alle Krieger, die als nächstes hinzugefügt werden, kommen in dieses Team.

Daraus ergibt sich:

<?php
$battle = new Battle(Battle::team_deathmatch, true);
$warrior1 = array(
   Battle::warrior_name => "Mensch",
   Battle::warrior_group => "Team A",
   Battle::warrior_hp => 50,
   Battle::warrior_off => 10,
   Battle::warrior_off_m => 1.2,
   Battle::warrior_def => 5,
   Battle::warrior_def_m => 1.6
);
$warrior2 = array(
   Battle::warrior_name => "Kobold",
   Battle::warrior_group => "Team A",
   Battle::warrior_hp => 40,
   Battle::warrior_off => 12,
   Battle::warrior_off_m => 1.3,
   Battle::warrior_def => 6,
   Battle::warrior_def_m => 1.5
);
$warrior3 = array(
   Battle::warrior_name => "Elf",
   Battle::warrior_group => "Team B",
   Battle::warrior_hp => 100,
   Battle::warrior_off => 5,
   Battle::warrior_off_m => 1.7,
   Battle::warrior_def => 10,
   Battle::warrior_def_m => 1.6
);
$warrior4 = array(
   Battle::warrior_name => "Zwerg",
   Battle::warrior_group => "Team B",
   Battle::warrior_hp => 30,
   Battle::warrior_off => 30,
   Battle::warrior_off_m => 1.7,
   Battle::warrior_def => 7,
   Battle::warrior_def_m => 1.2
);
$warrior5 = array(
   Battle::warrior_name => "Vampir",
   Battle::warrior_group => "Team C",
   Battle::warrior_hp => 50,
   Battle::warrior_off => 15,
   Battle::warrior_off_m => 1.8,
   Battle::warrior_def => 3,
   Battle::warrior_def_m => 1.1
);
$warrior6 = array(
   Battle::warrior_name => "Drache",
   Battle::warrior_group => "Team C",
   Battle::warrior_hp => 140,
   Battle::warrior_off => 10,
   Battle::warrior_off_m => 1.2,
   Battle::warrior_def => 5,
   Battle::warrior_def_m => 1.6
);

$battle -> add_group("Team A", Battle::blue);
$battle -> add_warrior($warrior1);
$battle -> add_warrior($warrior2);

$battle -> add_group("Team B", Battle::red);
$battle -> add_warrior($warrior3);
$battle -> add_warrior($warrior4);

$battle -> add_group("Team C", Battle::green);
$battle -> add_warrior($warrior5);
$battle -> add_warrior($warrior6);


[quote]Hinweis:
Die Namen der Teams müssen bei den Kriegern und den Gruppen übereinstimmen.[/quote]
[quote]Tipp:
Die Farben der Teams können sowohl über die klassenbezogenen Konstanten (Battle::red, Battle::blue, Battle::green, Battle::yellow) als auch eigene Farbcodes (#FFFFFF, #000000, s.o.) festgelegt werden.[/quote]

Schritt vier: Kampf starten

Als nächstes wird der Kampf über die Methode ->start() durchgeführt.

Als Parameter kann man 3 Variablen übergeben:

Zufällige Angreifer ($random)
empfohlen: false
Über diese Variabel lässt es sich festlegen, ob die Krieger nacheinander konstant nach ihrer Reihenfolge sich gegenseitig angreifen oder nach jeder Runde zufällig ein Angreifer ausgewählt wird.

Zufälliger erster Angreifer ($random_offender)
empfohlen: false
Hier geht es um den ersten Angreifer in der ersten Runde. Wird der Wert auf false gesetzt, greift der erst hinzugefügte Krieger an. Wenn nicht, wird irgendein Krieger ausgewählt.

Maximal Überlebende ($random) (nur in (Team) Deathmatch)
empfohlen: 1
Die Zahl, die angibt, wann der Kampf aufhört, d.h. wie viele am Ende überleben bleiben sollen. Gewöhnlicherweise ist der Wert 1.

So sieht das Beispiel nun aus:
<?php
$battle = new Battle(Battle::team_deathmatch, true);
$warrior1 = array(
   Battle::warrior_name => "Mensch",
   Battle::warrior_group => "Team A",
   Battle::warrior_hp => 50,
   Battle::warrior_off => 10,
   Battle::warrior_off_m => 1.2,
   Battle::warrior_def => 5,
   Battle::warrior_def_m => 1.6
);
$warrior2 = array(
   Battle::warrior_name => "Kobold",
   Battle::warrior_group => "Team A",
   Battle::warrior_hp => 40,
   Battle::warrior_off => 12,
   Battle::warrior_off_m => 1.3,
   Battle::warrior_def => 6,
   Battle::warrior_def_m => 1.5
);
$warrior3 = array(
   Battle::warrior_name => "Elf",
   Battle::warrior_group => "Team B",
   Battle::warrior_hp => 100,
   Battle::warrior_off => 5,
   Battle::warrior_off_m => 1.7,
   Battle::warrior_def => 10,
   Battle::warrior_def_m => 1.6
);
$warrior4 = array(
   Battle::warrior_name => "Zwerg",
   Battle::warrior_group => "Team B",
   Battle::warrior_hp => 30,
   Battle::warrior_off => 30,
   Battle::warrior_off_m => 1.7,
   Battle::warrior_def => 7,
   Battle::warrior_def_m => 1.2
);
$warrior5 = array(
   Battle::warrior_name => "Vampir",
   Battle::warrior_group => "Team C",
   Battle::warrior_hp => 50,
   Battle::warrior_off => 15,
   Battle::warrior_off_m => 1.8,
   Battle::warrior_def => 3,
   Battle::warrior_def_m => 1.1
);
$warrior6 = array(
   Battle::warrior_name => "Drache",
   Battle::warrior_group => "Team C",
   Battle::warrior_hp => 140,
   Battle::warrior_off => 10,
   Battle::warrior_off_m => 1.2,
   Battle::warrior_def => 5,
   Battle::warrior_def_m => 1.6
);

$battle -> add_group("Team A", Battle::blue);
$battle -> add_warrior($warrior1);
$battle -> add_warrior($warrior2);

$battle -> add_group("Team B", Battle::red);
$battle -> add_warrior($warrior3);
$battle -> add_warrior($warrior4);

$battle -> add_group("Team C", Battle::green);
$battle -> add_warrior($warrior5);
$battle -> add_warrior($warrior6);

$battle -> start(false, false, 1);


Schritt fünf: Kampflog ausgeben

Der letzte Schritt ist einfach, wenn man die vorprogrammierte Methode benutzt. Der Log wird als Array gespeichert. Das Array enthält alle Informationen der Runden, Krieger, Gruppen und mehr. Diese Informationen können über ->debug() ausgegeben werden. Das Log ist über ->getLog() erreichbar.

Das Beispiel zusammengefasst:
Vorschau: http://dev.desc-net.de/products/bcreator/use.battle.php
<?php
$battle = new Battle(Battle::team_deathmatch, true);
$warrior1 = array(
   Battle::warrior_name => "Mensch",
   Battle::warrior_group => "Team A",
   Battle::warrior_hp => 50,
   Battle::warrior_off => 10,
   Battle::warrior_off_m => 2,
   Battle::warrior_def => 5,
   Battle::warrior_def_m => 5
);
$warrior2 = array(
   Battle::warrior_name => "Kobold",
   Battle::warrior_group => "Team A",
   Battle::warrior_hp => 40,
   Battle::warrior_off => 12,
   Battle::warrior_off_m => 2,
   Battle::warrior_def => 6,
   Battle::warrior_def_m => 3
);
$warrior3 = array(
   Battle::warrior_name => "Elf",
   Battle::warrior_group => "Team B",
   Battle::warrior_hp => 100,
   Battle::warrior_off => 5,
   Battle::warrior_off_m => 4,
   Battle::warrior_def => 10,
   Battle::warrior_def_m => 3
);
$warrior4 = array(
   Battle::warrior_name => "Zwerg",
   Battle::warrior_group => "Team B",
   Battle::warrior_hp => 30,
   Battle::warrior_off => 30,
   Battle::warrior_off_m => 3,
   Battle::warrior_def => 7,
   Battle::warrior_def_m => 2
);
$warrior5 = array(
   Battle::warrior_name => "Vampir",
   Battle::warrior_group => "Team C",
   Battle::warrior_hp => 50,
   Battle::warrior_off => 15,
   Battle::warrior_off_m => 5,
   Battle::warrior_def => 3,
   Battle::warrior_def_m => 1
);
$warrior6 = array(
   Battle::warrior_name => "Drache",
   Battle::warrior_group => "Team C",
   Battle::warrior_hp => 140,
   Battle::warrior_off => 10,
   Battle::warrior_off_m => 2,
   Battle::warrior_def => 5,
   Battle::warrior_def_m => 3
);

$battle -> add_group("Team A", Battle::blue);
$battle -> add_warrior($warrior1);
$battle -> add_warrior($warrior2);

$battle -> add_group("Team B", Battle::red);
$battle -> add_warrior($warrior3);
$battle -> add_warrior($warrior4);

$battle -> add_group("Team C", Battle::green);
$battle -> add_warrior($warrior5);
$battle -> add_warrior($warrior6);

$battle -> start(false, false, 1);
$battle -> debug($battle -> getLog());


[quote]Tipp:
Um Logausgaben zu verändern, empfiehlt es sich für Fortgeschrittene in der Methode ->debug() nachzuschauen.
[/quote]