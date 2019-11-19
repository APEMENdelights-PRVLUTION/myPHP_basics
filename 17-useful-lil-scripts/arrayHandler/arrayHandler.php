<?php


   /**
    * This function converts an array into a separated string
    *
    * @param Array $myarray The array to convert to string
    * @param String $output The reference to the output string
    * @param String $parentkey It is a helper variable
    */
   function array2string($myarray,&$output,&$parentkey){
      foreach($myarray as $key=>$value){
         if (is_array($value)) {
            $parentkey .= $key." - ";
            array2string($value,$output,$parentkey);
            $parentkey = "";
         }
         else {
            $output .= $parentkey.$key." - ".$value."\n";
         }
      }
   }

   /**
    * This function converts a separated string into an array
    *
    * @param String $string The string to convert into an Array
    * @param Array $myarray The array to store the output
    */
   function string2array($string,&$myarray){
      $lines = explode("\n",$string);
      foreach ($lines as $value){
         $items = explode(" - ",$value);
         if (sizeof($items) == 2){
            $myarray[$items[0]] = $items[1];
         }
         else if (sizeof($items) == 3){
            $myarray[$items[0]][$items[1]] = $items[2];
         }
      }
   }
?>