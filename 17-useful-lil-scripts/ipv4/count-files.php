<?php
/* Zählt alle Dateien incl. allen Dateien in Unterordnern
 *
 * $dir => Hier wird der Grundpfad angegeben
 *
 *********************************************************/
function filecounter($dir){
    $dirs  = 0;    // Variable für die Verzeichnisse
    $files = 0; // Variable für die Dateien

    $path = scandir($dir);    // Gibt den Inhalt des ganzen Verzeichnisses in einem Array wieder

    foreach($path as $file){ // Wiederhole den Vorgang solange bis jedes Element des Arrays "$path" überprüft wurde
        if($file != '.' && $file != '..'){ // Ignoriert die Elemente "." und ".."
            if(is_dir($dir.'/'.$file)){    // Prüft ob es sich um ein Verzeichnis handelt
                $dirs++; // Inkrementiert $dirs um 1
                $back     = filecounter($dir.'/'.$file); // Zählt alle Dateien und Verzeichnisse in diesem Verzeichnis. Wiederholt sich solange wie es Unterverzeichnisse gibt.
                $dirs  += $back[0];    // Inkrementiert $dirs mit der Anzahl der Ausgewerteten Verzeichnisse durch "count_subdirectory"
                $files += $back[1]; // Inkrementiert $files mit der Anzahl der Ausgewerteten Dateien durch "count_subdirectory"
            } elseif(is_file($dir.'/'.$file)) { // Prüft ob es sich um eine Datei handelt
                $files++; // Inkrementiert $files um 1
            }
        }
    }

    $rtn = array($dirs, $files); // Erstelle ein Array aus den beiden Werten
    return $rtn; // Gebe das Array zurück
}

$verzeichnis = './';

$anzahl = filecounter($verzeichnis); // Bekommt ein Array mit den Informationen zurück
$ordner = $anzahl[0];
$dateien = $anzahl[1];

echo "Es befinden sich $dateien Dateien im Verzeichnis \"$verzeichnis\"";

echo "Es befinden sich $ordner Ordner im Verzeichnis \"$verzeichnis\"";
