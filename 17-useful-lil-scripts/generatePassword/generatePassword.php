<?php

function generatePassword($length,$level=2){

   list($usec, $sec) = explode(' ', microtime());
   srand((float) $sec + ((float) $usec * 100000));

   $validchars[1] = "0123456789abcdfghjkmnpqrstvwxyz";
   $validchars[2] = "0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
   $validchars[3] = "0123456789_!@#$%&*()-=+/abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_!@#$%&*()-=+/";

   $password  = "";
   $counter   = 0;

   while ($counter < $length) {
     $actChar = substr($validchars[$level], rand(0, strlen($validchars[$level])-1), 1);

     // All character must be different
     if (!strstr($password, $actChar)) {
        $password .= $actChar;
        $counter++;
     }
   }

   return $password;

}

    $length   = isset($_POST['passlength']) ? $_POST['passlength'] : 6;
    $strength = isset($_POST['passstrength']) ? $_POST['passstrength'] : 2;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Micro Password generator</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
      <div id="caption">PASSWORD GENERATOR</div>
      <div id="icon">&nbsp;</div>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <table>
          <tr><td>Password length:&nbsp;&nbsp; </td><td>
            <select name="passlength">
              <option value="4" <?php if ($length == 4) echo "selected"; ?>>4</option>
              <option value="5" <?php if ($length == 5) echo "selected"; ?>>5</option>
              <option value="6" <?php if ($length == 6) echo "selected"; ?>>6</option>
              <option value="7" <?php if ($length == 7) echo "selected"; ?>>7</option>
              <option value="8" <?php if ($length == 8) echo "selected"; ?>>8</option>
              <option value="9" <?php if ($length == 9) echo "selected"; ?>>9</option>
              <option value="10" <?php if ($length == 10) echo "selected"; ?>>10</option>
              <option value="11" <?php if ($length == 11) echo "selected"; ?>>11</option>
              <option value="12" <?php if ($length == 12) echo "selected"; ?>>12&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
            </select>
          </td></tr>
          <tr><td>Password strength:&nbsp;&nbsp;</td><td>
            <select name="passstrength">
              <option value="1" <?php if ($strength == 1) echo "selected"; ?>>Easy</option>
              <option value="2" <?php if ($strength == 2) echo "selected"; ?>>Normal</option>
              <option value="3" <?php if ($strength == 3) echo "selected"; ?>>Hard&nbsp;&nbsp;</option>
            </select>
          </td></tr>
          <tr><td ><br/><input class="text" type="submit" name="submitBtn" value="Generate"></td></tr>
        </table>
      </form>
<?php    
    if (isset($_POST['submitBtn'])){

?>
      <br/>
      <div id="caption">GENERATED PASSWORD</div>
      <div id="icon2">&nbsp;</div>
      <div id="result">
        <table width="100%"><tr><td>
<?php
            echo generatePassword($length,$strength);
?>
          </td></tr>
        </table>
     </div>
<?php            
    }
?>
    <div>
</body>   