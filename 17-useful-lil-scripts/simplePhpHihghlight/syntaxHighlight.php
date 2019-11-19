<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>PHP Syntax Highlighter</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="main">
      <div id="caption">PHP Syntax Highlighter</div>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="domain" id="domain">
        PHP code to highlight:
        <table>
          <tr><td><textarea class="text" name="codeSrc" rows="15" cols="53"></textarea></td></tr>
          <tr><td align="center"><br/><input class="text" type="submit" name="submitBtn" value="Highlight it!"></td></tr>
        </table>  
      </form>

<?php    
  /* DISPLAY RESULT */
    if (isset($_POST['submitBtn'])){
        $codeSrc = (isset($_POST['codeSrc'])) ? $_POST['codeSrc'] : '';
        $codeSrc = stripslashes($codeSrc);
        $codeOut = htmlspecialchars(highlight_string($codeSrc,true));
        echo '<div id="caption">GENERATED HTML CODE</div>';
        echo '<div id="result1">
               <table width="100%"><tr><td>
                  <textarea class="text" name="codeSrc" rows="15" cols="53">'.$codeOut.'</textarea></td></tr></table>
             </div>';
        echo '<div id="caption">DISPLAY HTML CODE</div>';
        echo '<div id="result">
               <table width="450"><tr><td>'.highlight_string($codeSrc,true).'</td></tr></table>
             </div>';

    }        
?>
    <div>
</body>   
