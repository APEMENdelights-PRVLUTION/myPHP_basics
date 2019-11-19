<?php


// Check if the form is submitted if ( isset( $_GET['submit'] ) )
{ // retrieve the form data by using the element's name attributes value as key
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
// display the results echo '<h3>Form GET Method</h3>';
echo 'Your name is ' . $lastname . ' ' . $firstname; exit;
}

?>

<form action="get-method.php" method="get">
  <input type="text" name="firstname" placeholder="First Name" />
  <input type="text" name="lastname" placeholder="Last Name" />
  <input type="submit" name="submit" />
</form>
