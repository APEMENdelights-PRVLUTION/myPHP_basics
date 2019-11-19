Installation:

1. At the begining of your page add a session start
      <?php session_start(); ?>
2. To display the image with the security code simply use the following code
      <img src="securityCode.php" />
3. Create an input field for the user input like this:
      <input class="text" name="secCode" type="text" size="10" />
4. During the form processing the security code on the image can be found in the $_SESSION array as securityCode
      if ($secCode == $_SESSION['securityCode']) {
      
That's all.