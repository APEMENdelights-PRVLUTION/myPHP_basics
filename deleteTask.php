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


if(isset($_GET['id'])){
    $id = $_GET['id'];
    // init establishment database
    db();
    global $linkTasksystem;
    // prepare sql statement  DELETE by using unique id in table
    $queryTaskDelete = "DELETE FROM tasks WHERE id_task = '$id'";
    // gather connection definition and our statements in our variables to execute using only one variable
    $deleteTask = mysqli_query($linkTasksystem, $queryTaskDelete);
    if($deleteTask){
        // message success TODO display in modal
        echo 'Task successfully deleted. ';
    }
}
?>

<?php
include 'templates/footer.inc.php';
?>