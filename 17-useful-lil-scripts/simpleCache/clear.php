<?php
   require_once('cache.class.php');
   $CacheManager = new Cache();
   $CacheManager->cleanCache();
   
   // Redirect to the index page
   header("Location:index.php");
?>