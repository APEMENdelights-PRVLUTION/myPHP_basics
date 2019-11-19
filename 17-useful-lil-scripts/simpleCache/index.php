<?php
   require_once('cache.class.php');
   $CacheManager = new Cache();
   $CacheManager->startCache();
   
   echo "Start Cache example at: ".date('H:i:s')."<br/>";
   sleep(2);
   echo "End Cache example at: ".date('H:i:s')."<br/>";

   echo "<br/><a href='clear.php'>Clean the cache</a><br/>";
   
   $CacheManager->endCache();
   
?>
