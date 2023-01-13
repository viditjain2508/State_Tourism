<?php
$con = mysqli_connect('localhost','root');
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysqli_select_db($con,'state');

$a=$_POST['nm'];
$b=$_POST['nm1'];
$c=$_POST['2nm'];
$d=$_POST['nm4'];
$e=$_POST['nm6'];
$f=$_POST['nm8'];
$g=$_POST['nm55'];
$sql="INSERT INTO notamem VALUES ('$a','$b','$c','$d','$e','$f','$g')";
$v="INSERT INTO cus_login VALUES ('$a','$b')";


if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "<script>alert('Registered Successfully!.')</script>"; 
mysqli_query($con,$v);

echo "<script>window.open('customerlogin.html','_self')</script>";
mysqli_close($con);

?>