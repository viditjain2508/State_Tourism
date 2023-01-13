<?php
$con = mysqli_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysqli_select_db($con,'state');

$x="$_POST[nm6]";

$sql="delete from package_details where package_id='$x'";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysql_error());
  }
echo "1 pack deleted";


echo"<br/>";

echo"UPDATED PACKAGE list:";


$result = mysqli_query($con,"SELECT * FROM package_details"); 

echo "<table border='1'>
<tr>
<th>package-id</th>
<th>Location</th>
<th>Date</th>

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