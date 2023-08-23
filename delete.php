<?php
$employeeid = $_POST['empid'];
$taskid = $_POST['taskid'];
$servername="localhost";
$username="root";
$password="";
$dbname='task';

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
  {
    die("Connection Failed:" .connect_error);
  }
  
  $sql = "DELETE FROM completetask WHERE empid = '$employeeid' AND taskid = '$taskid'";
  if(mysqli_query($conn,$sql) == TRUE) 
  {
	  header("location:completasks.php");
  }
  else
  {
	   echo "Error deleting record : " .mysqli_connect_error();
  }
?>