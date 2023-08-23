<?php
if(isset($_GET["empid"]) && isset($_GET["taskid"]))
{	
	$employeeid = $_GET["empid"];
    $taskid = $_GET["taskid"];
	
	$servername="localhost";
$username="root";
$password="";
$dbname='task';

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
  {
    die("Connection Failed:" .connect_error);
  }
  
$sql = "UPDATE completetask SET status = 'completed' WHERE empid= '$employeeid' and taskid='$taskid' ";

if(mysqli_query($conn, $sql) == TRUE) {
	
	header("location:completasks.php");
}
else
{
	echo "Error updating record : " . mysqli_error($conn);
}
}
?>