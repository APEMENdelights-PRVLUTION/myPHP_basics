<?php
/**
 * Created with PhpStorm.
 * User: philip foitzik
 * Date: 13/05/19
 * Time: 2:01 AM
 */

// securely include the database connection file using require_once
require_once "conf/db_connect.php";
// template shizzl
include 'templates/head.inc.php';

// Get task to display by giving ID
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    // execute db() function and pp $link from conf/db_connect
    db();
    global $linkTasksystem;
    // preparing the query to display
    $query = "SELECT taskName, relatedMilestone, taskDescription, taskDeadline, taskCreated FROM tasks WHERE id_task = '$id'";
    $result = mysqli_query($linkTasksystem, $query);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        if($row){
            $title = $row['taskName'];
            $milestone = $row['relatedMilestone'];
            $description = $row['taskDescription'];
            $deadline = $row['taskDeadline'];
            $date = $row['taskCreated'];

            echo "
            <h2>$title</h2>
            <h3>Related Milestone</h3>
            <p> $milestone </p>
            <h3>Task description</h3>
            <p>$description</p>
            <h3></h3>
            <p>$deadline</p>
            <small>Task was created at $date</small>
            ";
        }
    }else{
        echo 'no task to display';
    }
}
?>


<ul>
<button type="button"><a href="editTask.php?id=<?php echo $id?>">Edit</a></button>
<button type="button"><a href="deleteTask.php?id=<?php echo $id?>">Delete</a></button>
</ul>

<?php
include 'templates/footer.inc.php';
?>
