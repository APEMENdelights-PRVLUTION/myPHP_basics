<?php
//*****************************************************************************
//
// MICRO FILE BROWSER  -  Version: 1.0
//
// You may use this code or any modified version of it on your website.
//
// NO WARRANTY
// This code is provided "as is" without warranty of any kind, either
// expressed or implied, including, but not limited to, the implied warranties
// of merchantability and fitness for a particular purpose. You expressly
// acknowledge and agree that use of this code is at your own risk.
//
//*****************************************************************************

function showContent($path){


   if ($handle = opendir($path))
   {
       $up = substr($path, 0, (strrpos(dirname($path."/."),"/")));
       echo "<tr><td colspan='2'><img src='style/up2.gif' width='16' height='16' alt='up'/> <a href='" .$_SERVER['PHP_SELF']."?path=$up'>Up one level</a></td></tr>";

       while (false !== ($file = readdir($handle)))
       {
           if ($file != "." && $file != "..")
           {
               $fName = $file;
               $file = $path.'/'.$file;
               if(is_file($file)) {
                   echo "<tr><td><img src='style/file2.gif' width='16' height='16' alt='file'/> <a href='".$file."'>".$fName."</a></td>"
                            ."<td align='right'>".date ('d-m-Y H:i:s', filemtime($file))."</td>"
                            ."<td align='right'>".filesize($file)." bytes</td></tr>";
               } elseif (is_dir($file)) {
                   print "<tr><td colspan='2'><img src='style/dir2.gif' width='16' height='16' alt='dir'/> <a href='".$_SERVER['PHP_SELF']."?path=$file'>$fName</a></td></tr>";
               }
           }
       }

       closedir($handle);
   }	

}

if (isset($_POST['submitBtn'])){
	$actpath = isset($_POST['path']) ? $_POST['path'] : '.';	
} else {
	$actpath = isset($_GET['path']) ? $_GET['path'] : '.';	
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Micro File Browser</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
      <div class="caption">MICRO FILE BROWSER</div>
      <div id="icon">&nbsp;</div>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="path">
        <table width="100%">
          <tr><td>Path: <input class="text" name="path" type="text" size="40" value="<?php echo $actpath; ?>" /></td></tr>
          <tr><td align="center"><br/><input class="text" type="submit" name="submitBtn" value="List content" /></td></tr>
        </table>  
      </form><br/>

      <div class="caption">ACTUAL PATH: <?php echo $actpath ?></div>
      <div id="icon2">&nbsp;</div>
      <div id="result">
        <table width="100%">
<?php
			showContent($actpath);        
?>
        </table>
     </div>
	<div id="source">Micro File Browser 1.0</div>
    </div>
</body>   
