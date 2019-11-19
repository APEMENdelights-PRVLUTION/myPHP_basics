<?php
   require_once('arrayHandler.php');   

   // Create some test data
   $mydb[0]['name'] = "John";
   $mydb[0]['city'] = "Boston";
   $mydb[0]['age']  = "32";
   $mydb[1]['name'] = "Max";
   $mydb[1]['city'] = "London";
   $mydb[1]['age']  = "41";
   $mydb[2]['name'] = "Ann";
   $mydb[2]['city'] = "Bonn";
   $mydb[2]['age']  = "29";
   $mydb[3]['name'] = "Peter";
   $mydb[3]['city'] = "Dallas";
   $mydb[3]['age']  = "28";
   $mydb[4]['name'] = "Martin";
   $mydb[4]['city'] = "Berlin";
   $mydb[4]['age']  = "22";
   
   // Convert the array into string
   array2string($mydb,$output,$parent);
   
   // Store the string in a file   
   $f1 = fopen("test.txt","w+");
   fwrite($f1,$output);
   fclose($f1);

   // Read the file back from the disk
   $f1 = fopen("test.txt","r");
   $newString = fread($f1,filesize('test.txt'));
   fclose($f1);
   
   // Convert the content back to an array
   string2array($newString, $newArray);

   // Print out the array
   foreach ($newArray as $item) {
      echo 'Name: '.$item['name'].'<br/>';
      echo 'City: '.$item['city'].'<br/>';
      echo 'Age: '. $item['age'].'<br/>';
   }
      	

?>