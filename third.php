<?php


require_once("dbconnect.php");


$qq = mysqli_query($con," INSERT INTO task (task_name,task_description,due_date,status) VALUES ('name','$task','$date','progress') ");
if(($qq = $con->prepare($qq))){
        $qq->bind_param("s", $_POST["ename"], $_POST["progress"]);
        $qq->execute();
        header("location: todo.php");
}
?>