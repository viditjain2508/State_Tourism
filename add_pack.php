<?php

$con = mysqli_connect("localhost","root","");

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
   
mysqli_select_db($con,"state");

$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

$sql="INSERT INTO package_details VALUES ('$_POST[nm6]','$_POST[nm]','$_POST[desc]','$_POST[basic_amount]','$_POST[bus_amount]','$_POST[train_amount]','$_POST[flight_amount]','$file')";
if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }

echo "1 package datails added";

echo"<br/>";

echo"UPDATED PACKAGE list:";


$result = mysqli_query($con,"SELECT * FROM package_details"); 

echo "<table border='1'>
<tr>
<th>package-id</th>
<th>Location</th>
<th>Description</th>
<th>BASIC AMOUNT</th>
<th>BUS AMOUNT</th>
<th>TRAIN AMOUNT</th>
<th>FLIGHT AMOUNT</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['package_id'] . "</td>";
  echo "<td>" . $row['location'] . "</td>";
  echo "<td>" . $row['description'] . "</td>";
  echo "<td>" . $row['basic_amount'] . "</td>";
  echo "<td>" . $row['bus_amount'] . "</td>";
  echo "<td>" . $row['train_amount'] . "</td>";
  echo "<td>" . $row['flight_amount'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysqli_close($con);

?>
<html>
  <br>
  <a href="addpack.html">BACK</a>
</html>