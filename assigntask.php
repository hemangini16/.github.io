<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['n'])) {
    header("location: login.php"); // Redirect to the login page if not logged in
    exit();
}
$servername="localhost";
$username="root";
$password="";
$dbname='task';

$conn = new mysqli($servername,$username,$password,$dbname);
	
if(isset($_POST['assign'])){


if($conn->connect_error)
  {
    die("Connection Failed:" .connect_error);
  }

$taskname = $_POST['task1'];
$status = "Pending";
if(!empty ($_POST['empid'])){
$empid= $_POST['empid'];
}
 
 $sql = "Insert into completetask (empid,taskname,status) values ('$empid','$taskname','$status')";
 
 mysqli_query($conn,$sql);
 header("location: pendingtasks.php");
}

$sql1 = "select empid FROM login";
$result = mysqli_query($conn,$sql1);
if(mysqli_num_rows($result)>0)
{

?>

<html>
<head> <title> ASSIGN TASK </title>


<style>

.container
{
   background-color:B3EDF0;
   height:440px;
   width:600px;
   margin-top:100px;
   border-radius:20px;
}

.c1
{
   font-size:24px; 
}

input,select
{
   padding:8px 23px;
   width: 300px;
   font-size:20px;
   
}
.button
{
  padding: 9px 34px;
  background-color:EEBC80;
  color:000000;
  font-size:23px;
  
}

.button:hover
{
   opacity: 0.8;
   cursor: pointer;
}

.shiftedtextbox
{
  padding:8px 23px;
  font-size:20x;
  margin-left: 10px;
}


</style>
</head>

<body>
<center>
<form method="POST" >
<div class="container">
<br>

<div class="c1">
<center> <h3> ASSIGN TASK </h3> <br>
<label for="task1"> Task Name </label> &nbsp; &nbsp; &nbsp; 
<input type="text" name="task1" class="shiftedtextbox" placeholder="Enter Task Name"> <br> <br> 
 
 <label for="task1"> Employee ID </label> &nbsp; &nbsp; 
<select name="empid">
<option> select </option>
<?php 
while($row = mysqli_fetch_assoc($result))
{
	?>
	<option value="<?php echo $row['empid'];?>"><?php echo $row['empid'];?></option>
<?php }} ?>
</select> <br><br> <br> <br>
</div>

<input type="submit" class="button" value="Submit" name="assign">

</div>
</form> 
</center>
</body>
</html>
