

<?php

// Usage
// Copy and paste the given code in your page and make use of the script.
// Here the function get_browser_name() is used to obtain the various browsers name.
// Simple php script detects the widely used web browsers in your website.


function get_browser_name()
{
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    $browser = 'Unknown';
    $version= "";
    if(preg_match('/MSIE/i',$useragent) && !preg_match('/Opera/i',$useragent))
    {
        $browser = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$useragent))
    {
        $browser = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$useragent))
    {
        $browser = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$useragent))
    {
        $browser = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$useragent))
    {
        $browser = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$useragent))
    {
        $browser = 'Netscape';
        $ub = "Netscape";
    }
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
        ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $useragent, $matches)) {
// we have no matching number just continue
    }
    $i = count($matches['browser']);
    if ($i != 1) {
        if (strripos($useragent,"Version") < strripos($useragent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
    if ($version==null || $version=="") {$version="?";}
    return array(
        'userAgent' => $useragent,
        'name' => $browser,
        'version' => $version
    );
}
$ua=get_browser_name();
$yourbrowser= "Your browser: " . $ua['name'] . " " . $ua['version'];
echo "<p align=center><font style='color:green;'><b>$yourbrowser</b></font></p>";
?>
