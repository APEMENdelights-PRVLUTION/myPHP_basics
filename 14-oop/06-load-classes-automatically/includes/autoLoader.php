<?php
// include the person class script
spl_autoload_register('myAutoLoader');
function myAutoLoader($className) {
    $path = "classes/";
    $extension = ".class.php";
    $fullPath = $path . $className . $extension;

    include_once $fullPath;
}