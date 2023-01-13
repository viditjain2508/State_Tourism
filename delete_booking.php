<?php
$con=mysqli_connect('localhost','root',"") ;
mysqli_select_db($con,'state')or die("Connection Failed to select database");
if(isset($_GET['package_id'])){
    $id=mysqli_real_escape_string($con,$_GET['package_id']);
    $username=mysqli_real_escape_string($con,$_GET['username']);
    $sql="delete from booking where package_id='$id' AND customer_name='$username'";
    if (!mysqli_query($con,$sql))
    {
        die('Error: ' . mysql_error());
    }
    //echo "1 pack deleted";

    
    echo "<script>alert('Booking Deleted Successfully!.')</script>"; 
    header("location: booking.php?username=".$username);
    mysqli_close($con);
}  
?>