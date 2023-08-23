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

if($conn->connect_error)
  {
    die("Connection Failed:" .connect_error);
  }
  
$sql= "select * from completetask where status='completed' ";
$result= mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0)
{
   
  
?>



<html>
<head> <title>COMPLETED TASKS </title>

<style>

header
{
  
  background-color:899596;
  padding 10px 0;
  font-size:30px;
}

.navbar
{
   list-style:none;
   display:flex;
   justify-content: flex-end;
   align-items: center;
   
}

.navbar li
{
  margin: 10 20px;
 }
 
.navbar a
{
   text-decoration:none;
   color:FFFFFF;
   
}

#p1
{
   font-size:40px;
   text-align:center;
   padding:14px;
   margin-top:1px;
}

table
{
  border-collapse:collapse;
  border: 2px solid black;
  padding:20px 0;
}

th
{
   
   background-color:A9DEB4;
   
   font-size:22px;
   
}
td
{
 
  background-color:FFFFFF;
  font-size:19px;
  text-align:center;
  
}

.but1
{
	background-color:#A9F36A;
    font-size:14px;
	border-radius:8px;
	width:60px;
	height:30px;
}

input
{
	border:0px;
	text-align:center;
}
</style>
<body bgcolor="D8F9FF">

<header>
<nav>
<ul class="navbar">
<li> <a href="home.php"> Home </a></li>
<li> <a href="login.php"> Logout </a></li>

</ul>
</nav>

</header>
</header>

<p id="p1"> Completed Tasks </p>

<center><table border="1" width="1200" height="100" cellpadding="15" cellspacing="0"></center>
<tr>
<th> Employee ID </th>
<th> Task ID </th>
<th> Task Name </th>
<th> Status </th>
<th> Remove </th>
</tr>
<?php
 while($row = mysqli_fetch_assoc($result))
{
?>

<form method="POST" action="delete.php">
<tr>
<td> <input type="text" name="empid" value = "<?php echo $row['empid']; ?>" </td>
<td> <input type="text" name="taskid" value = "<?php echo $row['taskid']; ?>" </td>
<td> <?php echo $row['taskname']; ?> </td>
<td> <?php echo $row['status']; ?> </td>

<td> <input type="submit" value="delete" name="delete" class="but1"> </td>
</tr>
</form>

<?php } ?>
</table>

<?php } 
else
{
  
  ?>

<h1> NO DATA FOUND </h1>
<?php } ?>
</body>
</html>












