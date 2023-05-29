<?php
include 'db.php';

if(!(isset($_POST['submit'])))
{
?>

<div="container" align=center>
<h2>add new task to to_do list</h2>
<form method="post" action="save.php">
<table border="1">
	<tr>
		<td>description</td>
		<td><input type="text" name="name"/></td>
	</tr>
	<tr>
		<td>date</td>
		<td><input type="text" name="day"/></td>
		<td><input type="text" name="month"/></td>
		<td><input type="text" name="year"/></td>
	</tr>
	<tr>
		<td>priority</td>
		<td><input type="text" name="priority"/></td>
	</tr>
	<tr><td><input type="submit" name="submit" value="submit" /></td></tr>
</table>
</form>
</div>
<?php
}else{
	$task_name=$_POST['name'];
	$day=$_POST['day'];
	$month=$_POST['month'];
	$year=$_POST['year'];
	$date=checkdate($month, $day, $year) ? mktime(0,0,0,$month,$day,$year) : die('ERROR: task date is invalid');
	$priority=$_POST['priority'];
try{
	$stmt=$db->prepare("insert into task(name,due,priority) values(?,?,?)");
	$stmt->bindparam(1,$task_name);
	$stmt->bindparam(2,$date);
	$stmt->bindparam(3,$priority);
	if(($stmt->execute()) == true ) {
		echo" data sussessfully added to database<br>";
	}
	
}catch(Exteption $e){
	echo $e->getmessage();
}

}
?>
<>