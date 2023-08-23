<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['n'])) {
    header("location: login.php"); // Redirect to the login page if not logged in
    exit();
}
?>
<html>
<head> <title> HOME PAGE </title>

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
   padding:30px;
   margin-top: 10px;
}

.container
{
   background-color:none;
   display:flex;
   flex-wrap:wrap;
   justify-content:center;
}

.task
{
  height:300px;
  width:265px;
  padding:50px;
  margin:30px;
  background-color:#FFFF;
  text-align:center;
  
}

.task p
{
   color:#333;
   margin:10px 0;
}

.headings
{
   font-size:32px;
   margin-top:20px;
   padding:30px;
}
.image
{
   border-radius:5%;
}
.image2
{
    position:absolute;
	top: 270px;
	left:43%;
	
}

.heading2
{
   font-size:32px;
   margin-left:-20px;
   margin-top:78px;
   
}

.image3
{
   margin-left:30px;
}
.heading3
{
font-size:32px;
   margin-top:28px;
   padding:40px;
}
a
{
	text-decoration:none;
}

</style>
<body bgcolor="9BDAEE">

<header>
<nav>
<ul class="navbar">
<li> <a href="login.php"> Logout </a></li>
</ul>
</nav>

</header>
</header>

<p id="p1"> Task Management System </p>

<div class="container">
<a href="completasks.php">
<div class="task">
<img src="assign-task-outlook.jpg" height="176" width="210" class="image"> <br>
<p class="headings"> Complete Task </p>
</div>
</a>

<a href="pendingtasks.php">
<div class="task">
<img src="pending.jpg" height="257" width="285" class="image2">
<p style="margin-top:217px" class="heading2"> Pending Task </p>

</div>
</a>

<a href="assigntask.php">
<div class="task">
<img src="add.png" height="170" width="186" class="image3">
<p class="heading3"> Add Task </p>
</div>
</a>


</body>
</html>
