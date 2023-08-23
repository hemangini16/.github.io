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
  
$sql= "select * from completetask where status='pending' ";
$result= mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0)
{
   
  
?>



<html>
<head> <title>PENDING TASKS </title>

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

<p id="p1"> Pending Tasks </p>

<center><table border="1" width="1200" height="100" cellpadding="15" cellspacing="0"></center>
<tr>
<th> Employee ID </th>
<th> Task ID </th>
<th> Task Name </th>
<th> Status </th>
</tr>
<?php
 while($row = mysqli_fetch_assoc($result))
{
?>

<tr>
<td> <?php echo $row['empid']; ?> </td>
<td> <?php echo $row['taskid']; ?> </td>
<td> <?php echo $row['taskname']; ?> </td>
<td> <a href="pending2.php?empid=<?php echo $row['empid']; ?> &taskid=<?php echo $row['taskid']; ?>">
     <?php echo $row['status']; ?>
     </a>

 </td>

</tr>

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






























