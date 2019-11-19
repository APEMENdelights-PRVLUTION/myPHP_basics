<?php 
    require_once('resizeimage.php'); 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "DTD/xhtml1-transitional.dtd">
<html>
<head>
   <title>Micro Image Pack Demo</title>
</head>

<body><div style="text-align: center;">
    The original image is:<br/><img src="test.jpg"><br/><br/>
    Resize the image, save and display the small pic.<br/>
    
<?php 
    //Resize the image
    $myimg1 = resizeImage('test.jpg',180,120);
    // Creat the new file
    imagejpeg($myimg1,'result1.jpg',100);
    //Display the new image
    echo '<img src="result1.jpg" border="0">';
    
    echo "<br/>Now add a shadow effect to the image:<br/>";
    //Drop shadow
    $myimg2 = dropShadow($myimg1);
    // Creat the new file
    imagejpeg($myimg2,'result2.jpg',100);
    //Display the new image
    echo '<img src="result2.jpg" border="0">';

    echo "<br/>And at least add a border to it:<br/>";
    //Add border
    $myimg3 = createBorder($myimg2,220,220);
    // Creat the new file
    imagejpeg($myimg3,'result3.jpg',100);
    //Display the new image
    echo '<img src="result3.jpg" border="0">';
    
?>
    
</div></body>

