<?php
$con=mysqli_connect('localhost','root');

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysqli_select_db($con,'state')or die("Connection Failed to select database");
$loc="$_POST[location]";
$result = mysqli_query($con,"SELECT * FROM package_details where location='$loc'");
if (mysqli_num_rows($result)>0)
{ 
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
}
else echo"no records found";
mysqli_close($con);
?>