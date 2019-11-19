<?php
/*
 * As PHP was originally constructed as template system and related
 * to modern mvc and object orientated programming, it's a common
 * technique to outsource theme partials, variables or configurations
 *
 * menu= template part menu
 * vars = variables
 * footer= template part footer
*/
include './incl/head.php';
include './incl/menue.php';
?>

<div class="content-wrapper">


<h2>PHP WAS INVENTED AS TEMPLATE SYSTEM</h2>

<ul class="features">
  <h3>PHP IS EASY TO MAINTAIN</h3>
  <li>ENABLES YOU TO INCLUDE LAYOUT PARTIALLY!</li>
  <li>PASS VARIABLES USING VARIOUS METHODS!</li>
</ul>

<div class="data-container">
  <?php include './conf/vars.php';?>
  I have been passed including variables using the php
    <span class="function">
    <?php echo "$method" ?> </span> function to use the variables defined in <?php echo " $path " ?>
</div>



<?php
include './incl/footer.php';
?>

