<?php
    function checkDomain($domain,$server,$findText){
        // Open a socket connection to the whois server
        $con = fsockopen($server, 43);
        if (!$con) return false;
        
        // Send the requested doman name
        fputs($con, $domain."\r\n");
        
        // Read and store the server response
        $response = ' :';
        while(!feof($con)) {
            $response .= fgets($con,128); 
        }
        
        // Close the connection
        fclose($con);
        
        // Check the response stream whether the domain is available
        if (strpos($response, $findText)){
            return true;
        }
        else {
            return false;   
        }
    }
    
    function showDomainResult($domain,$server,$findText){
       if (checkDomain($domain,$server,$findText)){
          echo "<tr><td>$domain</td><td>AVAILABLE</td></tr>";
       }
       else echo "<tr><td>$domain</td><td>TAKEN</td></tr>";
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Simple Whois domain checker</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
      <div id="caption">DOMAIN LOOKUP</div>
      <div id="icon">&nbsp;</div>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="domain" id="domain">
        Domain name:
        <table>
          <tr><td><input class="text" name="domainname" type="text" size="36"/></td></tr>
          <tr>
            <td>
                <input type="checkbox" name="all" checked />All
                <input type="checkbox" name="com"/>.com
                <input type="checkbox" name="net"/>.net
                <input type="checkbox" name="org"/>.org
                <input type="checkbox" name="info"/>.info
            </td></tr>
            <tr><td align="center"><br/><input class="text" type="submit" name="submitBtn" value="Check domain"/></td></tr>
        </table>  
      </form>
<?php    
    if (isset($_POST['submitBtn'])){
        $domainbase = (isset($_POST['domainname'])) ? $_POST['domainname'] : '';
        $d_all      = (isset($_POST['all'])) ? 'all' : '';    
        $d_com      = (isset($_POST['com'])) ? 'com' : '';    
        $d_net      = (isset($_POST['net'])) ? 'net' : '';    
        $d_org      = (isset($_POST['org'])) ? 'org' : '';    
        $d_info     = (isset($_POST['info'])) ? 'info' : '';    

        // Check domains only if the base name is big enough
        if (strlen($domainbase)>2){
?>
      <div id="caption">RESULT</div>
      <div id="icon2">&nbsp;</div>
      <div id="result">
        <table width="100%">
<?php        
            if (($d_com != '') || ($d_all != '') ) showDomainResult($domainbase.".com",'whois.crsnic.net','No match for');
            if (($d_net != '') || ($d_all != '') ) showDomainResult($domainbase.".net",'whois.crsnic.net','No match for');
            if (($d_org != '') || ($d_all != '') ) showDomainResult($domainbase.".org",'whois.publicinterestregistry.net','NOT FOUND');
            if (($d_info != '') || ($d_all != '') ) showDomainResult($domainbase.".info",'whois.afilias.net','NOT FOUND');
?>
        </table>
     </div>
<?php            
        }
    }
?>
      <div id="source">SIMPLE WHOIS BY APEMENDELIGHTS</div>
    </div>
</body>   
