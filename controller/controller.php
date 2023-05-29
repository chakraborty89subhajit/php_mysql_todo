<?php
include '../db.php';
$name=$_POST['name'];
$due=$_POST['date'];
$priority=$_POST['priority'];
//echo "$name"." "."$date"." "."$priority";
$task=new Task();

if($task->addTask($name,$due,$priority)){
	echo"successfully add to database from controller";
}else{
	echo"something wrong";
}

?>