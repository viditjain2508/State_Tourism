<?php

$con=mysqli_connect('localhost','root');

mysqli_select_db($con,'state');

$userid=$_POST["firstname"];

$pass=$_POST["pass"];

$query="select * from admin where username='$userid'";

$result=mysqli_query($con,$query);

while($result1=mysqli_fetch_array($result))
{

if($userid==$result1[0]&&$pass==$result1[1])

{

 echo"successful login";
header("Location:adminhome.php");

 }

else

{
echo "invalid username or password";
}

}

?>