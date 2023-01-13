<?php

$con=mysqli_connect("localhost","root","");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysqli_select_db($con,'state')or die("Connection Failed to select database");

$pid="$_POST[nm55]";



echo"PACKAGE booked by:-> $_POST[nm11]";
echo"</br>";
echo"BOOKING DETAILS:";

$result = mysqli_query($con,"SELECT * FROM package_details where package_id='$pid'"); 

echo "<table border='1'>
<tr>
<th>Package-ID</th>
<th>location</th>
<th>date</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['package_id'] . "</td>";
  echo "<td>" . $row['location'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
 
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);
?>