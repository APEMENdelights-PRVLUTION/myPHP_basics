<?php
/**
 * ****************************************************************************
 * Micro Cache
 * 
 * Version: 1.0
 * Release date: 2007-09-05
 * 
 * USAGE:
 *   You need to instantiate the Cache class and call the startCache function 
 *   befor any output. At the end of your code you need to call the endCache 
 *   function. To clean the cache you need to call the claenCache function.
 * 
 *   See the attached index.php and clear.php how to use it.
 * 
 *   ATTENTION: Before using the script don't forget to create the cache
 *   directory with correct rights and set it below in the cacheDir variable. 
 *  
 */

class Cache {
   var $status    = true;     // True to switch on cache and false to switch it off
   var $cacheDir  = 'cache/'; // The default directory where to store chached files
   var $cacheFile = '';       // The content of the actual cached file
   var $timeOut   = 1000;     // The time how long the cached file remains reusable
   var $startTime = 0;        // The startime to determine script execution time 
   var $cache     = true;     // Shows if chaching actual content is needed
   
   function startCache(){
      $this->startTime = $this->getMicroTime();
      if ($this->status){ 
         $this->cacheFile = $this->cacheDir . urlencode( $_SERVER['REQUEST_URI'] );
         if ( (file_exists($this->cacheFile)) && 
              ((fileatime($this->cacheFile) + $this->timeOut) > time()) )
         {
            //Read file from the cache
            $handle = fopen($this->cacheFile , "r");
            $html   = fread($handle,filesize($this->cacheFile));
            fclose($handle);
          
            // Display the content
            echo $html;

            //Display the rendering time
            echo '<p>Total time: '.round(($this->getMicroTime())-($this->startTime),4).'</p>';
            
            //Exit from the code as we displayed cached data
            exit();
          }
          else
          {
             // Set to save generated content into file
             $this->caching = true;
          }
      }
    }
    
   function endCache(){
      if ($this->status){
         if ( $this->caching )
         {
            //You were caching the contents so display them, and write the cache file
            $html = ob_get_clean();
            echo $html;
            $handle = fopen($this->cacheFile, 'w' );
            fwrite ($handle, $html );
            fclose ($handle);

            //Display the rendering time
            echo '<p>Total time: '.round(($this->getMicroTime()-$this->startTime),4).'</p>';
         }
      }       
    }  
    
    function cleanCache(){
       if ($handle = opendir($this->cacheDir)) {
          while (false !== ($file = readdir($handle))) {
             if (is_file($this->cacheDir.$file)) unlink($this->cacheDir.$file);
          }

          closedir($handle);       
       }
    }
    
    
    function getMicroTime() {
   	    list($usec, $sec) = explode(" ",microtime());
  	    return ((float)$usec + (float)$sec);
    }
    
}
?>