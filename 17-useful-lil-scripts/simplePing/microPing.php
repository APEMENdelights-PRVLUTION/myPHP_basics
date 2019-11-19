<?php

function pingDomain($domain){
    $starttime = microtime(true);
    $file      = fsockopen ($domain, 80, $errno, $errstr, 10);
    $stoptime = microtime(true);
    $status    = 0;

    if (!$file) $status = -1;  // Site is down
    else {
        fclose($file);
        $status = ($stoptime - $starttime) * 1000;
        $status = floor($status);
    }
    return $status;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>SimplePing domain status checker</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
      <div id="caption">DOMAIN STATUS</div>
      <div id="icon">&nbsp;</div>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="domain" id="domain">
        Domain name:<div style="text-align: center;">
        <table>
          <tr><td><input class="text" name="domainname" type="text" size="36"></td></tr>
          <tr><td align="center"><br/><input class="text" type="submit" name="submitBtn" value="Ping domain"></td></tr>
        </table></div>
      </form>
<?php    
    if (isset($_POST['submitBtn'])){
        $domainbase = (isset($_POST['domainname'])) ? $_POST['domainname'] : '';
        $domainbase = str_replace("http://","",strtolower($domainbase));

?>
      <div id="caption">RESULT</div>
      <div id="icon2">&nbsp;</div>
      <div id="result">
        <table width="100%">
<?php
          $status = pingDomain($domainbase);
          if ($status != -1) echo "<tr><td>http://$domainbase is ALIVE ($status ms)</td><tr>";
          else               echo "<tr><td>http://$domainbase is DOWN</td><tr>";
?>
        </table>
     </div>
<?php            
    }
?>
    <div>
</body>   