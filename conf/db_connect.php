<?php
/**
 * Created with PhpStorm.
 * User: philip foitzik
 * Date: 13/05/19
 * Time: 2:01 AM
 */

// connect to database
function db(){
    global $linkTasksystem;
    $linkTasksystem = mysqli_connect("localhost", "root", "secret", "db_tutorial") or die("couldn't connect to database");
    return $linkTasksystem;

   // global $linkLoginsystem;
   // $linkLoginsystem = mysqli_connect("localhost", "root", "secret", "loginsystem") or die("couldn't connect to loginsystem");
   // return $linkLoginsystem;
}
