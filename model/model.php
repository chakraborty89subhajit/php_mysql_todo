<?php
include 'task.php';

public function addTask($name,$due,$status){
try{
	$stmt=$this->db->prepare("insert into task(name,due,status) values(?,?,?)");
	$stmt->bindparam(1,$id);
	$stmt->bindparam(2,$due);
	$stmt->bindparam(3,$status);
    $stmt->execute();
    return true;
}catch(Exception $e){
echo $e->getMessage();
}
}

public function getTaskDetails(){


}

public function getTask(){

}




?>