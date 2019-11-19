<?php

function getSiteMeta($domain){
	$tags = get_meta_tags($domain);
	
	if (sizeof($tags) == 0){
		echo '<tr><td align="center"> No META information was found! </td></tr>';
	}
	
	foreach ($tags as $key=>$value) {
		echo "<tr><td class='key'>$key: </td><td class='values'>$value</td></tr>";
	}

}

$domainbase = (isset($_POST['domainname'])) ? $_POST['domainname'] : '';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>SimpleMetaSpider - Check website META information</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
      <div class="caption">SIMPLE META SPIDER</div>
      <div id="icon">&nbsp;</div>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="domain" id="domain">
        <table width="100%">
          <tr><td>Site URL: <input class="text" name="domainname" type="text" size="67" value="<?php echo $domainbase; ?>" /></td></tr>
          <tr><td align="center"><br/><input class="text" type="submit" name="submitBtn" value="Get META" /></td></tr>
        </table>  
      </form>
<?php    
    if (isset($_POST['submitBtn'])){
        $domainbase = str_replace("http://","",strtolower($domainbase));

?>
      <div class="caption">META DATA:</div>
      <div id="icon2">&nbsp;</div>
      <div id="result">
        <table width="100%">
<?php
        getSiteMeta("http://".$domainbase);
?>
        </table>
     </div>
<?php            
    }
?>
	<div id="source">Micro Meta Spider 1.0</div>
    </div>
</body>   
