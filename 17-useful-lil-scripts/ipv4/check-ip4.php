<?php
function checkIP($ip, $compareip, $baseip) {
    $ip        = explode(".", $ip);
    $compareip = explode(".", $compareip);
    $baseip    = explode(".", $baseip);
    $check = true;
    $count = count($ip);
    for ($i = 0; $i < $count; $i++) {
        if ($baseip[$i] == "255") {
            if ($ip[$i] != $compareip[$i]) {
                $check = false;
                break;
            }
        }
    }
    return $check;
} ?>

<?php
$ip = $_SERVER['REMOTE_ADD'];
if (checkIP($ip, $_SESSION['SESSION_IP'], "255.255.*.*")) {
    echo "Die IP stimmt.";
}
else {
    echo "Die IP stimmt nicht.";
}
?>