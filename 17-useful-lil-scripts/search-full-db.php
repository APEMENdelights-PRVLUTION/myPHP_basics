<?php
require_once "mysql_connect.php";      //Include um Verbindung zu DB aufzubauen, sollte klar sein
//die Funktion für eine SQL Abfrage heisst hier do_query()

$table = "tabelle";                //hier muss natürlich der Tabellenname angegeben werden


function alt_f($table, $searchstring)
{
    $cols = do_query("SHOW COLUMNS FROM $table");      //gibt die Spaltennamen aus
    if (!$cols) {
        die ('Abfrage konnte nicht ausgeführt werden: ' . mysql_error());
    }

    $string = "";                                        //nen paar Variablen initialisieren
    $i = 0;
    if (mysql_num_rows($cols) > 0) {                    // die einzelnen Spaltennamen durchlaufen
        while ($row = mysql_fetch_assoc($cols)) {          //gibt den Spaltennamen aus
            $i++;                                        //mitzählen
            $string .= "`" . $row[Field] . "` LIKE '%$searchstring%'";        //fügt die Anweisung für die SQL Abfrage zusammen
            if ($i < mysql_num_rows($cols)) $string .= " OR ";            //damit am Ende kein weiteres OR steht wird das letzte
        }                                                                //nicht angefügt
    }

    $result = do_query(" SELECT * FROM `$table` WHERE $string ");        //stellt die SQL Anfrage mit dem eben gebastelten Suchstring
    if (mysql_num_rows($result) > 0) {
        while ($row = mysql_fetch_assoc($result)) {                        //Array aus Ergebnissen bilden
            $data[] = $row;
        }
        return ($data);                                                    //Array zurückgeben
    } else return (false);                                                    //bzw. ein False wenn die Suche erfolglos war
}


if ($searchstring = $_POST[searchstring]) {                                //ab hier nur Script zum ausprobieren der Funktion
    if ($result = alt_f($table, $searchstring)) {
        echo "Die Suche ergab " . count($result) . " Ergebnisse<br>";
        foreach ($result as $value) {
            print_r($value);
            echo "<br>";
        }
    } else echo "Keine Ergebnisse";
} else {
    echo '<form action="alt_f.php" Method="post"><br>
    Suchwort: <input type="text" Name="searchstring"><br>
    <input type="submit"></form>';
}
?>


<?php
function alt_f ($table,$searchstring) {
    $cols = do_query("SHOW COLUMNS FROM $table");      //gibt die Spaltennamen aus
    if (!$cols) {
        die ('Abfrage konnte nicht ausgeführt werden: ' . mysql_error());
    }

    $string = "";                                        //nen paar Variablen initialisieren
    $i = 0;
    if (mysql_num_rows($cols) > 0) {                    // die einzelnen Spaltennamen durchlaufen
        while ($row = mysql_fetch_assoc($cols)) {          //gibt den Spaltennamen aus
            $i++;                                        //mitzählen
            $string .= "`".$row[Field]."` LIKE '%$searchstring%'" ;        //fügt die Anweisung für die SQL Abfrage zusammen
            if ($i < mysql_num_rows($cols)) $string .= " OR ";            //damit am Ende kein weiteres OR steht wird das letzte
        }                                                                //nicht angefügt
    }
    return($string);  //gibt den Suchstring zurück
}
?>


<?php
$suchstring = alt_f($table,$meinesuche);
$q = do_query (" SELECT * FROM `$table` WHERE ". $suchstring. " DESC LIMIT(1,1) ");
?>
