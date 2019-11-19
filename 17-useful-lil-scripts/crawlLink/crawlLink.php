<?php
function getPage($link){
   
   if ($fp = fopen($link, 'r')) {
      $content = '';
        
      while ($line = fread($fp, 1024)) {
         $content .= $line;
      }
   }

   return $content;  
}

function pingLink($domain){
    $file      = @fopen($domain,"r");
    $status    = -1;

    if (!$file) {
       $status = -1;  // Site is down
    }
    else {
        $status = 1;
        fclose($file);
    }
    return $status;
   
}

function checkPage($content){
   $links = array();
   
   if (strlen($content) > 10){
      $startPos = 0;
      while (strpos($content,'<a ',$startPos)){
         $spos  = strpos($content,'<a ',$startPos);
         $tmppos = strpos($content,'>',$spos);
         $spos  = strpos($content,'href',$spos);
         $spos1 = strpos($content,'"',$spos)+1;
         $spos2 = strpos($content,"'",$spos)+1;
         if ($spos2 < $spos1) $spos = $spos2;
         else $spos = $spos1;

         $epos1 = strpos($content,'"',$spos);
         $epos2 = strpos($content,"'",$spos);
         if ($epos2 < $epos1) $epos = $epos2;
         else $epos = $epos1;
         
         $startPos = $epos;
         $link = substr($content,$spos,$epos-$spos);
         if (strpos($link,'http://') !== false) $links[] = $link;
      }
   }
   
   return $links;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Simple Link Checker</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
      <div id="caption">LINK STATUS</div>
      <div id="icon">&nbsp;</div>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="domain" id="domain">
        
        <table width="100%">
          <tr><td>URL to check:</td><td><input class="text" name="myurl" type="text" size="45"></td></tr>
          <tr><td align="center" colspan="2"><br/><input class="text" type="submit" name="submitBtn" value="Check links"></td></tr>
        </table>  
      </form>
<?php    
    if (isset($_POST['submitBtn'])){
         $url = isset($_POST['myurl']) ? $_POST['myurl'] : '';
         if (!(strpos($url,'http://') === 0) ) $url = 'http://'.$url;

?>
      <div id="caption">RESULT : <?php echo $url; ?></div>
      <div id="icon2">&nbsp;</div>
      <div id="result">
        <table width="100%">
<?php
         $txt = getPage($url);
         $linkArray = checkPage($txt);
         foreach ($linkArray as $value) {
            if (pingLink($value) <= 0){
               $status = "INVALID";
            } else {
               $status = "OK";
            }
         	echo "<tr><td align='left'>$value</td><td>$status</td></tr>";
         	sleep(2);
         	@ob_flush();
         	flush();
         }

?>
        </table>
     </div>
<?php            
    }
?>
    <div>
</body>   
