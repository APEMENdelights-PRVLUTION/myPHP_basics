
<?php
$dice[1] = 0.1;
$dice[2] = 0.1;
$dice[3] = 0.1;
$dice[4] = 0.8;
$dice[5] = 0.1;
$dice[6] = 0.1;
?>


<?php
echo 'Sie haben eine ' . dw_rand($dice) . ' gewürfelt.';
?>


<?php

function dw_rand ($space, $errval = false) {
    $res = 1000000000;
    $rn = mt_rand(0, $res - 1);

    foreach ($space as $element => $probability) {
        $psum += $probability * $res;
        if ($psum > $rn) return $element;
    }

    return $errval;
}

?>