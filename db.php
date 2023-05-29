<?php
$db=new PDO('mysql:
	host=localhost:3306;
	dbname=mydb;',
	'root',
	'project');

include'../model/task.php';
$task= new Task($db);

?>