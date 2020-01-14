<?php
/**
 * Created with PhpStorm.
 * User: philip foitzik
 * Date: 13/05/19
 * Time: 2:01 AM
 */

// securely bring in the database connection file using require_once
require_once "conf/db_connect.php";
session_start();

// template shizzl
include 'templates/head.inc.php';
include 'templates/menue.inc.php';


// init submit process by fetching the data from our $_POST title and description
if(isset($_POST['submit'])) {
    // grap passed data from $_POST submit of title field
    $title = $_POST['taskName'];
    // grap passed data from $_POST submit of description field
    $milestone = $_POST['relatedMilestone'];
    // grap passed data from $_POST submit of description field
    $description = $_POST['taskDescription'];
    // grap passed data from $_POST submit of description field
    $deadline = $_POST['taskDeadline'];

    // check strings
    function check($string){
        $string  = htmlspecialchars($string);
        $string = strip_tags($string);
        $string = trim($string);
        $string = stripslashes($string);
        return $string;
    }

    // Check title field and avoid empty title
    if(empty($title)){
        $error  = true;
        $titleErrorMsg = "Task name cannot be empty";
    }

  // // check and avoid empty milestone (optional)
  // if(empty($milestone)){
  //     $error = true;
  //     $descriptionErrorMsg = "Please select a milestone";
  // }

    // Check description field and avoid empty description
    if(empty($description)){
        $error = true;
        $descriptionErrorMsg = "Description cannot be empty";
    }

    // check and avoid empty deadline
    if(empty($deadline)){
        $error = true;
        $descriptionErrorMsg = "Please enter a deadline";
    }


    // connect to database by accessing db() function in db_connect
    db();
    global $linkTasksystem;
    // prepare mysql INSERT INTO statement
    $query = "INSERT INTO tasks(taskName, relatedMilestone, taskDescription, taskDeadline, taskCreated, taskUpdated) VALUES ('$title', '$milestone','$description', '$deadline', now(), now() )";

    $insertTask = mysqli_query($linkTasksystem, $query);
    if($insertTask){
        echo "You added " . $title ."to your agenda";
    }else{
        echo mysqli_error($linkTasksystem);
    }

}
?>

<html>
<head>
    <title>New Task</title>
</head>
<body>

<h1>New Task</h1>
<!--
<button type="submit"><a href="index.php">View all Todo</a></button>
-->

<form method="post" action="createTask.php">
    <p>Todo title: </p>
    <input name="taskName" type="text"  onfocus='inputFocus(this)'>
    <p>Related Milestone ID (INT)</p>
    <input name="relatedMilestone" type="text"  onfocus='inputFocus(this)'>
    <p>Todo description: </p>
    <input name="taskDescription" type="text"  onfocus='inputFocus(this)'>
    <br>
    <p>Task deadline</p>
    <input name="taskDeadline" type="datetime-local"  onfocus='inputFocus(this)'>
    <br>
    <input type="submit" name="submit" value="submit"  onfocus='inputFocus(this)'>
</form>

<?php
include 'templates/footer.inc.php';
?>
<script src="src/js/input-stylez.js"></script>
</body>
</html>

