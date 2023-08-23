<?php
session_start();

if(isset($_POST['login'])){
$servername="localhost";
$username="root";
$password="";
$dbname='task';

$conn = new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error)
  {
    die("Connection Failed:" .connect_error);
  }

$username=$_POST['u1'];
$password=$_POST['p1'];

$sql = "SELECT*FROM login WHERE userid='$username' and password='$password'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$count = mysqli_num_rows($result);
   if($count==1)
   {
      $_SESSION['n']=$username;
	  
      header("location:home.php");
	  exit();
	  
   }
   
   else
   {
  echo'<script>alert("Invalid Password or Username")</script>';
   }
}
?>


<html>
<head> <title> Login </title>


<style>

.container
{
   background-color:C1F0FF;
   height:475px;
   width:520px;
   margin-top:100px;
}

.c1
{
   font-size:24px; 
}

input
{
   padding:8px 20px;
   font-size:20px;
   
}
.button
{
  padding: 9px 34px;
  background-color:D25711;
  color:FFFFFF;
  font-size:20px;
  
}

.button:hover
{
   opacity: 0.8;
   cursor: pointer;
}

.pass
{
     margin-left:-9px;
}

</style>
</head>

<body>
<center>
<form method="POST">
<div class="container">
<br>

<div class="c1">
<h3> LOGIN </h3> <br>
User ID &nbsp; &nbsp;  <input type="text" name="u1" placeholder="Enter your ID" > <br> <br> <br>
Password &nbsp; &nbsp; <input type="password" name="p1" placeholder="Enter your Password" class="pass"> <br><br> <br> <br>
</div>

<input type="submit" class="button" value="Submit" name="login">

</div>
</form> 
</center>
</body>
</html>
