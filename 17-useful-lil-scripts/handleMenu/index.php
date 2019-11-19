<?php require_once("menuHandler.php"); ?>
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Menu System</title>
   <link href="style/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div id="main">
      <div class="caption">MENU SYSTEM</div>
      <div id="container">
         <div id="menu"><?php createMenu('link-3'); ?></div>
         <div id="content">
            <p>This is a Menu System Demo page!</p>
         </div>
      </div>
      <div id="source">2019 - Menus Sytem</div>
   </div>   
</body>   
</html>