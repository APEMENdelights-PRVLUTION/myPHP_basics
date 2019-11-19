<?php

//Pruefnummer ueberpruefen
function check_number($id, $checknumber) {
    $p = 7;
    $sum = 0;
    for($i=0; $i < strlen($id); $i++) {
        $char = $id{$i};

        if($char >= '0' && $char <= '9')
            $int = intval($char);
        else
            $int = ord($char)-55;

        $sum += $int*$p;

        if($p==1)
            $p=7;
        else if($p==3)
            $p=1;
        else if($p==7)
            $p=3;
    }

    $last_number = substr(strval($sum), -1);

    return $last_number == $checknumber;
}

//Gibt die Art (neu vs. alt) des Personalausweis zurück
function perso_type($id) {
    $splits = explode(" ", strtoupper($id));
    if(strlen($splits[0]) == 11 && strlen($splits[1]) == 7 && strlen($splits[2]) == 7 && strlen($splits[3]) == 1) {
        return 'old';
    } else if(strlen($splits[0]) == 10 && strlen($splits[1]) == 7 && strlen($splits[2]) == 8 && strlen($splits[3]) == 1) {
        return 'new';
    } else {
        return 'unknown';
    }
}

//Sind die Prüfziffern gültig
function perso_checksum($id) {
    $splits = explode(" ", strtoupper($id));

    $checksums = array();
    $perso_type = perso_type($id);

    if($perso_type == 'unknown') {
        return false;
    }

    $checksums[] = array(substr($splits[0],0,9), substr($splits[0],9,1));
    $checksums[] = array(substr($splits[1],0,6), substr($splits[1],6,1));
    $checksums[] = array(substr($splits[2],0,6), substr($splits[2],6,1));
    $checksums[] = array(substr($splits[0],0,10).substr($splits[1],0,7).substr($splits[2],0,7), $splits[3]);


    //Überprüfung der Checksummen
    foreach($checksums as $checksum) {
        if(!check_number($checksum[0], $checksum[1])) {
            return false;
        }
    }

    return true;
}

//Ist der Perso noch gültig?
function perso_gueltig($id) {
    $splits = explode(" ", $id);

    $valid_until = mktime(0,0,0, substr($splits[2], 2, 2) , substr($splits[2], 4, 2) , "20".substr($splits[2], 0, 2));

    //Ist der Perso noch gültig
    if(time() > $valid_until)
        return false;

    return true;
}

//Informationen aus dem Perso beziehen
function perso_info($id) {
    $splits = explode(" ", $id);

    //$return: Ein Objekt mit den Daten aus der Ausweisnummer
    $return = new stdClass();
    $return->perso_type = perso_type($id);
    $return->geb = new stdClass();
    $return->geb->tag= $splits[1]{4} . $splits[1]{5}; //Geburtstag
    $return->geb->monat = $splits[1]{2} . $splits[1]{3}; //Geburtsmonat
    $return->geb->jahr = $splits[1]{0} . $splits[1]{1}; //Geburtsjahr
    if($return->geb->jahr > intval(date("y"))) {
        $return->geb->jahr = "19".$return->geb->jahr;
    } else {
        $return->geb->jahr = "20".$return->geb->jahr;
    }


    $alter = date("Y") - $return->geb->jahr;

    //Hatte er schon Geburtstag?
    if( (date("n") < $return->geb->monat) OR (date("n") == $return->geb->monat AND date("j") < $return->geb->tag) ) {
        $alter--;
    }

    $return->alter = $alter;

    if($alter >= 18) {
        $return->volljaehrig = true;
    } else {
        $return->volljaehrig = false;
    }

    $return->ablauf = new stdClass();
    $return->ablauf->tag = $splits[2]{4} . $splits[2]{5}; //Ausweis Ablauf Tag
    $return->ablauf->monat = $splits[2]{2} . $splits[2]{3}; //Ausweis Ablauf Monat
    $return->ablauf->jahr = "20".$splits[2]{0} . $splits[2]{1}; //Ausweis Ablauf Jahr

    if($return->perso_type == 'old') {
        $return->herkunft = $splits[0]{10};
    } else {
        $return->herkunft = $splits[2]{7};
    }
    //Ein Deutscher?
    if(strtolower($return->herkunft) == "d") {
        $return->deutscher = true;
    } else {
        $return->deutscher = false;
    }
    //Behördenkennzahl als Nummer
    $return->behoerdenkennzahl = substr($splits[0], 0, 4);


    return $return;
}



//Beispiel zur Verwendung
if(isset($_GET['check'])) {
    $perso_id = $_POST['ida']." ".$_POST['idb']." ".$_POST['idc']." ".$_POST['idd'];
    //Oder:
    //$perso_id = "1234567891D 2345678 9012345 6"

    if(perso_checksum($perso_id)) {
        echo "Personalausweisnummer korrekt!";

        if(!perso_gueltig($perso_id)) {
            echo "<br> <b>Perso ist abgelaufen!</b>";
        }
        echo "<br><br> Daten der Ausweisnummer: <pre>";
        $data = perso_info($perso_id);
        print_r($data);
        echo "</pre>";

        //Zugriff z.B. so:
        //Alter: $data->alter;
        //Geburtsmonat: $data->geb->monat;
        //Ablauftag: $data->ablauf->tag;
    } else {
        echo "Personalausweisnummer falsch!<br><br>";
    }
}
?>


<!-- Kleines Anwendungsbeispiel -->
Neuer Personalausweis:<br>
<form action="?check=1" method="post" >
    IDD &lt;&lt; <input type="text" size="10" maxlength="10" name="ida">&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;<br>
    <input type="text" size="7" maxlength="7" name="idb"> &lt; <input type="text" size="8" maxlength="8" name="idc">&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;&lt;<input type="text" size="1" maxlength="1" name="idd"> <br>
    <input type="submit" value="überprüfen">
</form>

<br><hr><br>

Alter Personalausweis:<br>
<form action="?check=1" method="post" >
    <input type="text" size="11" maxlength="11" name="ida">&lt;&lt;
    <input type="text" size="7" maxlength="7" name="idb">&lt;
    <input type="text" size="7" maxlength="7" name="idc">&lt;&lt;&lt;&lt;&lt;
    <input type="text" size="1" maxlength="1" name="idd"> <br>
    <input type="submit" value="überprüfen">
</form>