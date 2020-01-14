<?php
/**
 * Created with PhpStorm.
 * User: philip foitzik
 * Date: 13/05/19
 * Time: 2:01 AM
 */

// securely include the database connection file using require_once
require_once "conf/db_connect.php";
include 'templates/head.inc.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    db();
    global $link;
    $query = "SELECT taskName, relatedMilestone ,taskDescription, taskDeadline FROM tasks WHERE id_task = '$id'";
    $result = mysqli_query($linkTasksystem, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        if ($row) {
            $title = $row['taskName'];
            $milestone = $row['relatedMilestone'];
            $description = $row['taskDescription'];
            $deadline = $row['taskDeadline'];

            echo "
            <h2>Edit Task " . $title . "</h2>
            <form action='editTask.php?id=$id' method='post'>
            <p>Title <br><input type='text' name='taskName' value='$title' onfocus='inputFocus(this)'></p>
            <p>Related Milestone ID<br><input type='text' name='relatedMilestone' value='$milestone' onfocus='inputFocus(this)'></p>
            <p>Short Description<br><input type='text' name='taskDescription' value='$description' onfocus='inputFocus(this)'></p>
            <p>Task Deadline <br><input type='datetime-local' name='taskDeadline' value='$deadline' onfocus='inputFocus(this)'></p>
            <p><input type='submit' name='submit' value='submit changings'></p>
            </form>
            ";
        }
    } else {
        echo "no task to edit";
    }

    if (isset($_POST['submit'])) {
        $title = $_POST['taskName'];
        $milestone = $_POST['relatedMilestone'];
        $description = $_POST['taskDescription'];
        $deadline = $_POST['taskDeadline'];
        db();
        $query = "UPDATE tasks SET taskName = '$title', relatedMilestone = '$milestone', taskDescription = '$description', taskDeadline = '$deadline'  WHERE id_task = '$id'";
        $insertEdited = mysqli_query($linkTasksystem, $query);
        if ($insertEdited) {
            echo "successfully updated task " . $title . " ";
        } else {
            echo mysqli_error($linkTasksystem);
        }
    }

}


include 'templates/footer.inc.php';
