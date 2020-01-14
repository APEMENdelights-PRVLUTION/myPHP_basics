<?php

/**
 * Created with PhpStorm.
 * User: philip foitzik
 * Date: 13/05/19
 * Time: 2:01 AM
 */

//  include the database connection file on demand using require_once
require_once "conf/db_connect.php";
include 'templates/head.inc.php';
?>
    <title>myTasks</title>
</head>
<body>
<?php include 'templates/menue.inc.php'; ?>

<div class="container-tasks">
<h2> ACTUAL TASKS </h2>
    <p><button type="button" id="btn-tasks"> <a href="createTask.php">add new task</a></button></p>

<?php
db();
global $linkTasksystem;
$query  = "SELECT id_task, taskName, relatedMilestone, taskDescription, taskDeadline, taskCreated FROM tasks";
$result = mysqli_query($linkTasksystem, $query);
//check if there's any data inside the table
if(mysqli_num_rows($result) >= 1){
    while($row = mysqli_fetch_array($result)){
        $id = $row['id_task'];
        $title = $row['taskName'];
        $milestone = $row['relatedMilestone'];
        $deadline = $row['taskDeadline'];
        $date = $row['taskCreated'];
        ?>
    <ul id="tasklist">
        <li>
            <a href="detailTask.php?id=<?php echo $id?>"><?php echo $title ?></a>
            <br><?php echo "<b>MILESTONE ID: </b> $milestone" ?>
            <br><?php echo "<b>DEADLINE: </b> $deadline";?>
        </li>
        <div class="btn-group">
        <button type="button" class="btn-success"><a href="editTask.php?id=<?php echo $id?>">Edit</a></button>
        <button type="button" class="btn-delete"><a href="deleteTask.php?id=<?php echo $id?>">Delete</a></button>
        </div>
    </ul>

<?php
    }
}

?>

</div>

<?php
include 'templates/footer.inc.php';
?>

</body>
</html>
