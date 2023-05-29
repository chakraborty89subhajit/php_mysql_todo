<?php
include'../db.php';

$id=$_GET['id'];
//echo $id;

$delete_by_id=new Task();

$delete_by_id->deleteTaskById($id);
?>