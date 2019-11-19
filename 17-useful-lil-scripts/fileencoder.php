
<?php
/*------------------------------------------------------------------------------------------
     File encoder

     ©PhpToys 2006
     http://www.phptoys.com

     Released under the terms and conditions of the
     GNU General Public License (http://gnu.org).

     $Revision: 1.0 $
     $Date: 2006/06/12 $
     $Author: PhpToys $
     
     USAGE:
          Specify the filename, the input characterset and the output characterset.
          The output is the converted text.
--------------------------------------------------------------------------------------------*/

    function encodeFile($inFile,$inCoding,$outCoding){
        // Open file
        $handleIn  = fopen($inFile, "r");
        
        // Read the file content        
        $contents = fread($handleIn, filesize($inFile));

        // Close file
        fclose($handleIn);
        
        // Converting file
        return iconv($inCoding, $outCoding, $contents);
        
    }  
?>



<?php
  /***************************************************************************************
  * 
  * Demonstration of the converter function
  * 
  ****************************************************************************************/


  if ( (!isset($_POST['submit'])) || ((isset($_POST['outputoption'])) && ($_POST['outputoption'] != "Download")))
  {
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
  <title>File Encoder Demo</title>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
  <style type="text/css">
    
    body {
	  margin: 0px;
	  padding: 0px;
	  color : #333;
	  background-color : #FFF;
	  font-size : 11px;
	  font-family : Arial, Helvetica, sans-serif;
    }

form {
    margin: 0px;
}

.text{
  font-size : 11px;
  font-family : Arial, Helvetica, sans-serif;
  font-weight : bold;
}

.text2{
  text-align:right;
  font-size : 10px;
  font-family : Arial, Helvetica, sans-serif;
  color : #aaaaaa;
}

.login {
	margin-left: auto;
	margin-right: auto;
	margin-top: 6em;
	padding: 15px;
	border: 1px solid #cccccc;
	width: 650px;
	background: #F1F3F5;
}
	
	
.form-block {
	border: 1px solid #cccccc;
	background: #E9ECEF;
	padding-top: 15px;
	padding-left: 10px;
	padding-bottom: 10px;
	padding-right: 10px;
}

.login-form {
	width: 100%;
    text-align:center;
}

input {
	border: 1px solid #cccccc;
	}

.ctr {
	text-align: center;
}

  </style>
</head>


<body>
  <div id="ctr">
    <div class="login">
		<div class="login-form">
          <div class="text">File converter</div><br/>
			<div class="form-block">

<?php 
    if (!isset($_POST['submit']))
    {
?>

			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data" method="post" name="convertForm" id="convertForm">
              <table width="100%" >
                <tr align=left>
                  <td class="text">Input file:</td>
                  <td><input name="inputfile" type="file"></td>
                  <td class="text">Input coding:</td>
                  <td>
                    <select name="inputcode">
                      <option>UTF-8</option>                
                      <option selected>ISO-8859-1</option>
                      <option>ISO-8859-2</option>
                      <option>LATIN1</option>
                      <option>LATIN2</option>
                      <option>WINDOWS-1250</option>
                      <option>WINDOWS-1252</option>
                    </select>
                  </td>
                </tr>
                <tr align=left>
                  <td class="text">Output option:</td>
                  <td><input name="outputoption" value="Download" type="radio" checked>Download / <input name="outputoption" value="Show" type="radio">Display here</td>
                  <td class="text">Output coding:</td>
                  <td>
                    <select name="outputcode">
                      <option selected>UTF-8</option>
                      <option>ISO-8859-1</option>
                      <option>ISO-8859-2</option>
                      <option>LATIN1</option>
                      <option>LATIN2</option>
                      <option>WINDOWS-1250</option>
                      <option>WINDOWS-1252</option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td style="text-align: center;" colspan="4" rowspan="1"><br/><input type="submit" name="submit" value="Convert file"></td>
                </tr>
              </table>
 			</form>
<?php
    }
    else
    {
        if ($_POST['outputoption'] == "Show")
        {
            echo encodeFile($_FILES['inputfile']['tmp_name'],$_POST['inputcode'],$_POST['outputcode']);
        }
    } 
?>        
   
			</div>
          <div class="text2">Version 1.0</div><br/>
		</div>
	</div>
  </div>
</body>

</html>
<?php
  }
  else if ( (isset($_POST['submit'])) && ($_POST['outputoption'] == "Download")){
      
     $filecontent=encodeFile($_FILES['inputfile']['tmp_name'],$_POST['inputcode'],$_POST['outputcode']);
     $downloadfile=$_FILES['inputfile']['name'].'.new';
           
     header("HTTP/1.1 200 OK");
     header("Content-Length: ".strlen($filecontent));
     header("Content-Type: application/force-download");
     header("Content-Disposition: attachment; filename=$downloadfile");
     header("Content-Transfer-Encoding: binary");            

     echo $filecontent;
  
  }
  
?>
  
  