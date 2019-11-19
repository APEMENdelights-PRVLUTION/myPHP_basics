<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>MicroCaptcha</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
      <div class="caption">SIMPLE CAPTCHA DEMO</div>
      <div id="icon">&nbsp;</div>
<?php
   if (isset($_POST['submitBtn'])){
      $secCode = isset($_POST['secCode']) ? strtolower($_POST['secCode']) : "";
      if ($secCode == $_SESSION['securityCode']) {
         echo "<p>The result code was valid!<br/></p>";
         echo "<p><a href=\"".$_SERVER['PHP_SELF']."\">Repeat the test!</a><br/><br/></p>";
         unset($_SESSION['securityCode']);
         $result = true;
      }
      else {
         echo "<p>Sorry the security code is invalid! Please try it again!</p>";
         $result = false;
      }
   }
   
   if ((!isset($_POST['submitBtn'])) || (!$result)){
?>      
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
        <table width="400">
          <tr><td>Security code: <input class="text" name="secCode" type="text" size="10" /></td>
              <td><img src="securityCode.php" alt="security code" border="1" /></td>
          </tr>
          <tr><td colspan="2" align="center"><br/><input class="text" type="submit" name="submitBtn" value="Send" /></td></tr>
        </table>  
      </form>
<?php
   } 
?>      
	<div id="source">Micro Captcha 1.0</div>
    </div>
</body>   
