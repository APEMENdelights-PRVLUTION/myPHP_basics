<!-- Usage

Copy and paste the above code in your webpage.
Here, the function micro_time() is used to return the time of execution speed.
Ifelse Conditions, Math Functions, and Loop are returned by their own functions
Php script displays the time taken for execution of the webpage.

-->

<style>
    table{
        margin:20px 1px;
        padding:0;
        border:0;
        border-spacing: 0;
        overflow: auto;
    }
    .table td
    {
        font: 0.81em/150% Tahoma,Geneva,sans-serif !important;
        color:#666;
        text-shadow:#fff 1px 1px 0;
        vertical-align:middle;
        padding:2px 2px 2px 12px;
        border-spacing: 0;
        border-collapse:collapse;
        border:1px solid #e8e8e8;
    }
    body {
        background: #fff none repeat scroll 0 0;
        font: 0.81em/150% Tahoma,Geneva,sans-serif;
        word-wrap: break-word;
    }
</style>


<?php
function micro_time() {
    $temp = explode(" ", microtime());
    return bcadd($temp[0], $temp[1], 6);
}
function test_StringManipulation($count = 130000) {
    $time_start = microtime(true);
    $stringFunctions = array("addslashes", "chunk_split", "metaphone", "strip_tags", "md5", "sha1", "strtoupper", "strtolower", "strrev", "strlen", "soundex", "ord");
    foreach ($stringFunctions as $key => $function) {
        if (!function_exists($function)) unset($stringFunctions[$key]);
    }
    $string = "the quick brown fox jumps over the lazy dog";
    for ($i=0; $i < $count; $i++) {
        foreach ($stringFunctions as $function) {
            $r = call_user_func_array($function, array($string));
        }
    }
    return number_format(microtime(true) - $time_start, 3);
}
function test_Loops($count = 19000000) {
    $time_start = microtime(true);
    for($i = 0; $i < $count; ++$i);
    $i = 0; while($i < $count) ++$i;
    return number_format(microtime(true) - $time_start, 3);
}
function test_Math($count = 140000) {
    $time_start = microtime(true);
    $mathFunctions = array("abs", "acos", "asin", "atan", "bindec", "floor", "exp", "sin", "tan", "pi", "is_finite", "is_nan", "sqrt");
    foreach ($mathFunctions as $key => $function) {
        if (!function_exists($function)) unset($mathFunctions[$key]);
    }
    for ($i=0; $i < $count; $i++) {
        foreach ($mathFunctions as $function) {
            $r = call_user_func_array($function, array($i));
        }
    }
    return number_format(microtime(true) - $time_start, 3);
}
function test_IfElse($count = 9000000) {
    $time_start = microtime(true);
    for ($i=0; $i < $count; $i++) {
        if ($i == -1) {
        } elseif ($i == -2) {
        } else if ($i == -3) {
        }
    }
    return number_format(microtime(true) - $time_start, 3);
}
$time_start = micro_time();
sleep(1);
$time_stop = micro_time();
$time_overall = bcsub($time_stop, $time_start, 6);
echo "<div align='center'>";
echo "<b>";
$kb=512;
echo "Streaming $kb Kb...<!-";
flush();
$time = explode(" ",microtime());
$start = $time[0] + $time[1];
for($x=0;$x<$kb;$x++){
    echo str_pad('', 1024, '.');
    flush();
}
$time = explode(" ",microtime());
$finish = $time[0] + $time[1];
$deltat = $finish - $start;

echo "-> Execution speed is - ". round($kb / $deltat, 3)."Kb/s";
echo "<table class='table'>";
echo "<tr>";
echo "<td>Execution time </td><td> $time_overall sec</td>";
echo "</tr>";
echo "<tr>";
echo "<td>StringManipulation Time </td><td>".test_StringManipulation()." sec</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Loops</td><td>".test_Loops()." sec</td>";
echo "</tr>";
echo "<tr>";
echo "<td>Math Functions </td><td>".test_Math()." sec</td>";
echo "</tr>";
echo "<tr>";
echo "<td>IfElse Conditions </td><td>".test_IfElse()." sec</td>";
echo "</tr>";
echo "</table>";
echo "</b>";
?>

<div id="dumdiv" align="center" style="font-size: 10px;color: #dadada;">
    <a id="dum" style="font-size: 10px;color: #dadada;text-decoration:none;color: #dadada;" href="https://www.hscripts.com">&copy;h</a>
</div>
</div>
