<?php

function saveFile($filename,$filecontent){
	if (strlen($filename)>0){
		$file = @fopen($filename,"w");
		if ($file != false){
			fwrite($file,$filecontent);
			fclose($file);
			return 1;
		}
		return -2;
	}
	return -1;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>SIMPLE FILE CREATOR</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
      <div class="caption">SIMPLE FILE CREATOR</div>
      <div id="icon">&nbsp;</div>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="domain" id="domain">
        <table width="100%">
          <tr><td>File name: <input class="text" name="filename" type="text" size="40" value="<?php echo $domainbase; ?>" /></td></tr>
          <tr><td><br/>File content: <textarea class="text" name="filecontent" rows="15" cols="46"></textarea></td></tr>
          <tr><td align="center"><br/><input class="text" type="submit" name="submitBtn" value="Save file" /></td></tr>
        </table>  
      </form>
<?php    
    if (isset($_POST['submitBtn'])){
        $filename    = (isset($_POST['filename']))    ? $_POST['filename']    : '' ;
        $filecontent = (isset($_POST['filecontent'])) ? $_POST['filecontent'] : '' ;

?>
      <div class="caption"></div>
      <div id="icon2">&nbsp;</div>
      <div id="result">
        <table width="100%">
<?php
        if (saveFile($filename,$filecontent) == 1){
        	echo "<tr><td><br/>File was saved!<br/><br/></td></tr>";
        } else if (saveFile($filename,$filecontent) == -2){
        	echo "<tr><td><br/>An error occured during saving file!<br/><br/></td></tr>";
        } else if (saveFile($filename,$filecontent) == -1){
        	echo "<tr><td><br/>Wrong file name!<br/><br/></td></tr>";
        }
        
?>
        </table>
     </div>
<?php            
    }
?>
    </div>
</body>   
