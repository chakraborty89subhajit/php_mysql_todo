<?php
include'../db.php';

$id=$_GET['id'];
//echo $id;

$delete=new Task();

$delete->viewTaskById($id);
?>