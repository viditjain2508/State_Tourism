<?php
$con=mysqli_connect('localhost','root',"") ;
mysqli_select_db($con,'state')or die("Connection Failed to select database");
if(isset($_GET['package_id'])){
    $id=mysqli_real_escape_string($con,$_GET['package_id']);
    $sql="delete from package_details where package_id='$id'";

    if (!mysqli_query($con,$sql))
    {
        die('Error: ' . mysql_error());
    }
    //echo "1 pack deleted";

    echo "<script>alert('Package Deleted Successfully!.')</script>"; 
    echo "<script>window.open('adminhome.php','_self')</script>";
    
    mysqli_close($con);
}  
?>