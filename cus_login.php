<?php
$con=mysqli_connect('localhost','root',"") ;
mysqli_select_db($con,'state')or die("Connection Failed to select database");

$userid=$_POST["firstname"];
$pass=$_POST["pass"];

$query="select * from cus_login where username='$userid'";

$result=mysqli_query($con,$query);

while($result1=mysqli_fetch_array($result))

{if($userid==$result1[0]&&$pass==$result1[1])

{ 
setcookie('id',$userid,time() + (86400 * 7));

header("Location:customerhome.php?username=$result1[0]");

 }

 else

echo "invalid username or password";

}
?>