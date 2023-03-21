<script>

</script>
<?php

include "dbconnect.php";
$errors = "";
if(isset($_POST["add"])){
    $task = $_POST["task"];
    $date = $_POST["date"];
    if(empty($task)){
        $errors="You must fill the task";
    }else{
        mysqli_query($con," INSERT INTO task (task_name,task_description,due_date,status) VALUES ('name','$task','$date','progress') ");
        header("location : todo.php");
    }
}

if(isset($_GET["delt"])){
    $id = $_GET["delt"];
    mysqli_query($con,"DELETE FROM task WHERE task_id = $id ");
    header("location : todo.php");
}
$tasks = mysqli_query($con," SELECT * FROM task ");
$categories = mysqli_query($con," SELECT * FROM category ");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Log In</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style media="screen">
      *,
      *:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

      body {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: linear-gradient(45deg, greenyellow, dodgerblue);
  font-family: "Sansita Swashed", cursive;
}
.center {
  position: relative;
  padding: 50px 50px;
  background: #fff;
  border-radius: 10px;
}
.center h1 {
  font-size: 2em;
  border-left: 5px solid dodgerblue;
  padding: 10px;
  color: #000;
  letter-spacing: 5px;
  margin-bottom: 60px;
  font-weight: bold;
  padding-left: 10px;
}
.center .inputbox {
  position: relative;
  width: 300px;
  height: 50px;
  margin-bottom: 50px;
}
.center .inputbox input {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  border: 2px solid #000;
  outline: none;
  background: none;
  padding: 10px;
  border-radius: 10px;
  font-size: 1.2em;
}
.center .inputbox:last-child {
  margin-bottom: 0;
}
.center .inputbox span {
  position: absolute;
  top: 14px;
  left: 20px;
  font-size: 1em;
  transition: 0.6s;
  font-family: sans-serif;
}
.center .inputbox input:focus ~ span,
.center .inputbox input:valid ~ span {
  transform: translateX(-13px) translateY(-35px);
  font-size: 1em;
}
.center .inputbox [type="button"] {
  width: 50%;
  background: dodgerblue;
  color: #fff;
  border: #fff;
}
.center .inputbox:hover [type="button"] {
  background: linear-gradient(45deg, greenyellow, dodgerblue);
}
table{
    width:470px;
    background-color:white;
    display:flex;
    justify-content:space-between;
    margin:50px;
    border-radius:10px;
}
td{
    padding:15px;
}
    </style>
</head>
<body>
<div class="center">
  <h1>TODO</h1>
  <form  action="todo.php?" method="post">
    <div class="inputbox">
      <input type="text" name="task" required="required">
      <span>TASK</span>
    </div>
    <div class="inputbox">
    <input type="text" name="category" required="required" >
    <span>CATEGORY</span>
    </div>
    <div class="inputbox">
    <input type="date" name="date" required="required" >
    </div>
    <div class="inputbox">
      <input type="submit" name="add" value="ADD">
    </div>
  </form>
</div>
<table>
<tr>
        <td style="color:red;font-weight:bold;text-decoration: underline;">ID</td>
        <td style="color:red;font-weight:bold;text-decoration: underline;">TASK</td>
        <td style="color:red;font-weight:bold;text-decoration: underline;">CATEGORY</td>
        <td style="color:red;font-weight:bold;text-decoration: underline;">DUE DATE</td>

    </tr>
<?php $i=1 ; while($row = mysqli_fetch_array($tasks)){
    ?>
    <tr>
        <td><?php echo $i ?>  </td>
        <td><?php echo $row["task_description"]; ?>  </td>
        <td><?php echo "haha"; ?>  </td>
        <td><?php echo $row["due_date"]; ?>  </td>
        <td><a style="border-radius:5px;text-decoration:none;color:white;background-color:red;padding:1px 6px" href="todo.php?delt=<?php echo $row['task_id'];?>">x</a>  </td>
    </tr>
<?php  $i++;
}
?>
</table>
</body>
</html>

