<?php

class Task{

	public $id;
	public $name;
	public $due;
	public $status;
    public $db; 
	public function __constract($id,$name,$due,$status,$db){
           $this->id=$id;
           $this->name=$name;
           $this->due=$due;
           $this->status=$status;
           $this->db=$db;

	}

	public function addTask($name,$due,$status){

		try{
			//include '../db.php';
			$db=new PDO('mysql:
	host=localhost:3306;
	dbname=mydb;',
	'root',
	'project');
			$stmt=$db->prepare("insert into task(name,due,priority) values(?,?,?)");
			$stmt->bindparam(1,$name);
			$stmt->bindparam(2,$due);
			$stmt->bindparam(3,$status);
			if($stmt->execute()){
				echo "data successfully added by addTask method<br>";
				return true;
			}else{
				echo"error in data addTask try block";
			}


		}catch(Exception $e){
			echo "error from addTask catch block".$e->getMessage();
		}
	}

	public function viewTask(){

		try{
			$db= new PDO('mysql:host=localhost; dbname=mydb','root','project'); 
			//$sql = "SELECT * FROM task";
            $result = $db->prepare("select * from task");
                 $result->execute();
             if($result->rowCount()>0)
             {
                      
 // retrieve record as associative array
             while( $row = $result->fetch(PDO::FETCH_ASSOC)){

             	?>
             	<table border="1"> 
             		<tr>
             			<td><?php if(isset($row['id'])){print($row['id']);}?></td>
             			<td><?php if(isset($row['name'])){print($row['name']);}?></td>
             			<td><?php if(isset($row['due'])){print($row['due']);}?></td>
             			<td><?php if(isset($row['priority'])){print($row['priority']);}?></td>
             			<td><a href="">modify</a></td>
             			<td><a href="../view/delete.php?id=<?php echo $row['id'];?>">delete</a></td>
             		</tr>

                   
         </table>
			<?php
			}
			}else{
                  echo"error in viewTask else method";

			}

		}catch(Exception $e)
		{
           echo "error from viewTask catch block".$e->getMessage();
		}
	}


           public function viewTaskById($id)	{

           	try{

           		$db= new PDO('mysql:host=localhost:3306;dbname=mydb','root','project');

           		$stmt=$db->prepare("select * from task where id =".$id);
           		$stmt->execute();

           		if(($stmt->rowCount())>0){
           			while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
           			?>
             	<table border="1"> 
             		<tr>
             			<td><?php if(isset($row['id'])){print($row['id']);}?></td>
             			<td><?php if(isset($row['name'])){print($row['name']);}?></td>
             			<td><?php if(isset($row['due'])){print($row['due']);}?></td>
             			<td><?php if(isset($row['priority'])){print($row['priority']);}?></td>
             			<td><a href="">modify</a></td>
             			<td><a href="../view/deleteTaskById.php?id=<?php echo $row['id'];?>">delete</a></td>
             		</tr>

                   
         </table>
			<?php	
           			}

           		}

           	}catch(Exception $e){

           		echo "error from viewTaskById method " .$e->getMessage();
           	}
           }


public function deleteTaskById($id)	{

           	try{

           		$db= new PDO('mysql:host=localhost:3306;dbname=mydb','root','project');

           		$stmt=$db->prepare("delete from task where id =".$id);
           		if($stmt->execute()){
           			echo "row deleted successfully<br>";

           		}else{
           			echo"can not delete the row<br>";
           		}
                     ?>
                      <a href="../view/view.php">back to task</a>";
                     <?php
           		

           	}catch(Exception $e){

           		echo "error from deleteTaskById method " .$e->getMessage();
           	}
           }



}

?>